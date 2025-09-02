<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class approveCourseNotification extends Notification
{
    use Queueable;

    protected $course;

    /**
     * Create a new notification instance.
     */
    public function __construct($course)
    {
        $this->course = $course;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $mailMessage = (new MailMessage)
            ->subject('Congratulation! Accepted Course Submission - ' . $this->course->title)
            ->greeting('Hello ' . $notifiable->name . ',')
            ->line('We are pleased to inform you has been accepted.')
            ->line('Course Title: ' .  $this->course->title )
            ->line('Course Description: ' .  $this->course->description );

       
        return $mailMessage
            ->line('Your course is now approved and available publicly.')
            ->action('View Course', url('/instructor/manage_courses'))
            ->line('Thank you for using Edvantage platform!');
    }

    /**
     * Get the database representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toDatabase(object $notifiable): array
    {
        return [
            'type' => 'course_approved',
            'course_id' => $this->course->id,
            'course_title' => $this->course->title,
            'approved_at' => now(),
        ];
    }

    public function toArray(object $notifiable): array
    {
        return [
            'type' => 'course_approved',
            'course_id' => $this->course->id,
            'course_title' => $this->course->title,
        ];
    }

}