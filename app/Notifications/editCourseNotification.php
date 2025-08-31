<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class editCourseNotification extends Notification
{
    use Queueable;

    protected $course;
    protected $editMessage;
    protected $adminName;

    /**
     * Create a new notification instance.
     */
    public function __construct($course, $editMessage, $adminName = null)
    {
        $this->course = $course;
        $this->editMessage = $editMessage;
        $this->adminName = $adminName ?? 'Administrator';
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Course Edit Request - ' . $this->course->title)
            ->greeting('Hello ' . $notifiable->name . ',')
            ->line('Your course "' . $this->course->title . '" requires some modifications before it can be approved.')
            ->line('**Edit Request Details:**')
            ->line($this->editMessage)
            ->line('Please review the feedback above and make the necessary changes to your course content.')
            ->action('Edit Your Course', url('/instructor/courses/' . $this->course->id . '/edit'))
            ->line('Once you have made the requested changes, please resubmit your course for review.')
            ->line('If you have any questions about the requested changes, please don\'t hesitate to contact our support team.')
            ->salutation('Best regards,')
            ->salutation($this->adminName)
            ->salutation('Edvantage Review Team');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'course_id' => $this->course->id,
            'course_title' => $this->course->title,
            'edit_message' => $this->editMessage,
            'admin_name' => $this->adminName,
            'type' => 'course_edit_request'
        ];
    }
    public function toDatabase(object $notifiable): array
{
    return [
        'course_id' => $this->course->id,
        'course_title' => $this->course->title,
        'edit_message' => $this->editMessage,
        'admin_name' => $this->adminName,
        'type' => 'course_edit_request'
    ];
}

}