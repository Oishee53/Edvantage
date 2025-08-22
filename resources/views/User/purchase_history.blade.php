<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchase History - Edvantage</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-50 min-h-screen">
    <div class="max-w-6xl mx-auto px-4 py-8">
        <!-- Header Section -->
        <div class="mb-8">
            <div class="flex items-center gap-3 mb-2">
                <div class="w-10 h-10 bg-gray-100 rounded-xl flex items-center justify-center">
                    <i class="fas fa-receipt text-gray-600 text-lg"></i>
                </div>
                <h1 class="text-2xl font-semibold text-gray-900">Purchase History</h1>
            </div>
            <p class="text-gray-600">View all your course purchases and enrollment details</p>
        </div>

        <!-- Content Section -->
        <div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
            @if($enrollments->isEmpty())
                <!-- Empty State -->
                <div class="text-center py-16 px-6">
                    <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-shopping-cart text-gray-400 text-xl"></i>
                    </div>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">No purchases yet</h3>
                    <p class="text-gray-600 mb-6">You haven't purchased any courses yet. Start exploring our course catalog!</p>
                    <a href="{{ route('courses.index') }}" class="inline-flex items-center gap-2 bg-gray-900 text-white px-6 py-3 rounded-xl hover:bg-gray-800 transition-colors">
                        <i class="fas fa-search text-sm"></i>
                        Browse Courses
                    </a>
                </div>
            @else
                <!-- Table Header -->
                <div class="bg-gray-50 px-6 py-4 border-b border-gray-200">
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        <div class="md:col-span-2">
                            <span class="text-sm font-medium text-gray-700">Course Details</span>
                        </div>
                        <div class="text-center">
                            <span class="text-sm font-medium text-gray-700">Price</span>
                        </div>
                        <div class="text-center">
                            <span class="text-sm font-medium text-gray-700">Purchase Date</span>
                        </div>
                    </div>
                </div>

                <!-- Table Body -->
                <div class="divide-y divide-gray-200">
                    @foreach($enrollments as $enrollment)
                        <div class="px-6 py-4 hover:bg-gray-50 transition-colors">
                            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 items-center">
                                <!-- Course Details -->
                                <div class="md:col-span-2">
                                    <div class="flex items-start gap-3">
                                        <div class="w-12 h-12 bg-gray-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                            <i class="fas fa-play-circle text-gray-600"></i>
                                        </div>
                                        <div>
                                            <h3 class="font-medium text-gray-900 mb-1">{{ $enrollment->course->title }}</h3>
                                            <p class="text-sm text-gray-600">
                                                @if($enrollment->course->instructor)
                                                    by {{ $enrollment->course->instructor->name }}
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Price -->
                                <div class="text-center">
                                    <span class="inline-flex items-center bg-green-50 text-green-700 px-3 py-1 rounded-full text-sm font-medium">
                                        ৳{{ number_format($enrollment->course->price, 2) }}
                                    </span>
                                </div>

                                <!-- Purchase Date -->
                                <div class="text-center">
                                    <div class="text-sm text-gray-900 font-medium">
                                        {{ $enrollment->created_at->format('d M Y') }}
                                    </div>
                                    <div class="text-xs text-gray-500">
                                        {{ $enrollment->created_at->format('g:i A') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Footer -->
                <div class="bg-gray-50 px-6 py-4 border-t border-gray-200">
                    <div class="flex items-center justify-between">
                        <div class="text-sm text-gray-600">
                            Total Purchases: <span class="font-medium text-gray-900">{{ $enrollments->count() }}</span>
                        </div>
                        <div class="text-sm text-gray-600">
                            Total Spent: <span class="font-medium text-green-600">৳{{ number_format($enrollments->sum(function($enrollment) { return $enrollment->course->price; }), 2) }}</span>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</body>
</html>
