<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Instructor;
use Illuminate\Http\Request;
use App\Models\CourseNotification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class InstructorController extends Controller
{
   public function viewInstructorHomepage()
{
    $instructor = Auth::user();
    $approvedCourses = DB::table('courses')
        ->where('instructor_id', Auth::id())
        ->get();

    $rejectedCourses = DB::table('course_notifications')
        ->where('status', 'rejected')
        ->where('instructor_id', Auth::id())
        ->get();

    $pendingCourses = DB::table('course_notifications')
        ->where('status', 'pending')
        ->where('instructor_id', Auth::id())
        ->get();

    $totalEarnings = DB::table('enrollments')
        ->join('courses', 'enrollments.course_id', '=', 'courses.id')
        ->where('courses.instructor_id', Auth::id())
        ->sum(DB::raw('courses.price * 0.7'));

    // Attach students to each approved course
    $coursesWithStudents = $approvedCourses->map(function($course) {
        $students = DB::table('enrollments')
            ->join('users', 'enrollments.user_id', '=', 'users.id')
            ->where('enrollments.course_id', $course->id)
            ->select(
                'users.id',
                'users.name',
                'users.email',
                'enrollments.created_at as enroll_date',
            )
            ->get();

        $course->students = $students;
        $course->student_count = $students->count();
        return $course;
    });

    // ✅ Return the view after mapping, not inside
    return view('Instructor.instructor_homepage', compact(
        'coursesWithStudents',
        'rejectedCourses',
        'pendingCourses',
        'totalEarnings',
        'approvedCourses'
    ));
}

    public function register(Request $request)
    {
        $validated = $request->validate([
            'area_of_expertise' => 'required|string|max:255',
            'qualification' => 'required|string|max:255',
            'video_editing_skill' => 'required|string',
            'target_audience' => 'required|string',
            'short_bio' => 'required|string',
        ]);

        // Store signup data in session
        session(['instructor_signup' => $validated]);

        // Redirect to payment setup page
        return view('Instructor.payment_setup');
    }

    // Step 2: Handle payment setup form
    public function savePaymentSetup(Request $request)
    {
        $validatedPayment = $request->validate([
            'card_type' => 'required|in:visa,mastercard',
            'card_holder_name' => 'required|string|max:255', // form field
            'card_number' => 'required',
            'expiry_month' => 'required|integer|min:1|max:12',
            'expiry_year' => 'required|integer|min:' . now()->year . '|max:' . (now()->year + 20),
            'cvv' => 'required|digits:3',
            'bank_name' => 'nullable|string|max:255',
        ]);

        // Merge expiry month/year into single field
        $validatedPayment['expiry_date'] = $validatedPayment['expiry_month'] . '/' . $validatedPayment['expiry_year'];
        unset($validatedPayment['expiry_month'], $validatedPayment['expiry_year']);

        // Retrieve signup data from session
        $signupData = session('instructor_signup');

        if (!$signupData) {
            return redirect()->route('instructor.register')
                ->withErrors(['error' => 'Session expired. Please fill out the signup form again.']);
        }

        $user = Auth::user();

        DB::transaction(function () use ($user, $signupData, $validatedPayment) {
            // Update user role
            $user->update(['role' => 3]);

            // Merge signup + payment data
            $instructorData = array_merge($signupData, $validatedPayment);
            $instructorData['user_id'] = $user->id;

            // Save to instructors table
            Instructor::create($instructorData);
        });

        // Clear session
        session()->forget('instructor_signup');

        return redirect('/instructor_homepage')->with('success', 'Instructor account created successfully!');
    }
    public function destroy($student_id)
{
    $user = User::findOrFail($student_id);

    if ($user->role == User::ROLE_INSTRUCTOR) {
        $user->role = User::ROLE_USER; // ✅ update role in the model
        $user->save(); // ✅ save the change
    }
    return redirect()->back()->with('success', 'Student unenrolled successfully.');
}
public function showRejectedCourses()
{   
    $user = auth()->user();
    $user->unreadNotifications()
        ->where('type', 'App\\Notifications\\rejectCourseNotification')
        ->update(['read_at' => now()]);
    // Get all rejection notifications for the logged-in instructor
    $notifications = DB::table('notifications')
        ->where('notifiable_id', auth()->id())
        ->where('type', 'App\\Notifications\\rejectCourseNotification')
        ->latest()
        ->get();

    $rejectedCourses = $notifications->map(function ($notification) {
        $data = json_decode($notification->data, true);

        return (object)[
            'id' => $data['course_id'] ?? null,
            'title' => $data['course_title'] ?? 'Untitled Course',
            'description' => $data['course_description'] ?? '',
            'rejection_message' => $data['rejection_message'] ?? 'No reason provided',
            'created_at' => $data['created_at'] ?? null,
            'rejected_at' => $data['rejected_at'] ?? $notification->created_at,
        ];
    });

    return view('instructor.rejected_course_details', compact('rejectedCourses'));
}
}
