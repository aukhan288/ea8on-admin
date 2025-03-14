<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use NotificationChannels\Fcm\FcmChannel;
use NotificationChannels\Fcm\FcmMessage;
use Illuminate\Support\Facades\Log;

class FirebaseNotification extends Notification
{
    use Queueable;

    protected $message;

    /**
     * Create a new notification instance.
     *
     * @param array $message
     */
    public function __construct(array $message)
    {
        // Store the message data passed when the notification is created
        $this->message = $message;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        // Log the user ID and FCM token information for debugging
        Log::info('Via method called for user ID: ' . $notifiable->id);

        // Ensure that the user has a valid FCM token (app_key)
        if (empty($notifiable->app_key)) {
            Log::warning('No FCM token found for user ID: ' . $notifiable->id);
        } else {
            Log::info('FCM Token for user ID ' . $notifiable->id . ': ' . $notifiable->app_key);
        }

        return [FcmChannel::class]; // Use the FCM channel to send notifications
    }

    /**
     * Get the FCM representation of the notification.
     *
     * @param mixed $notifiable
     * @return FcmMessage
     */
    public function toFcm($notifiable)
    {
        // Ensure FCM token is available for the user
        if (empty($notifiable->app_key)) {
            Log::warning('FCM token missing for user ID: ' . $notifiable->id);
            return; // Exit if no token found
        }
    
        // Log the notification details
        Log::info('Sending notification to user ID: ' . $notifiable->id, [
            'title' => $this->message['title'],
            'body' => $this->message['body']
        ]);
    
        try {
            // Construct the FCM message
            $fcmMessage = FcmMessage::create()
                ->withTitle($this->message['title'])
                ->withBody($this->message['body'])
                ->withPriority('high');  // Optional: Set priority to high
    
            // Send message via FCM
            $response = \Http::withHeaders([
                'Authorization' => 'key=' . env('FCM_SERVER_KEY'),
                'Content-Type' => 'application/json',
            ])->post('https://fcm.googleapis.com/fcm/send', [
                'to' => $notifiable->app_key,  // Ensure this token is correct
                'notification' => [
                    'title' => $this->message['title'],
                    'body' => $this->message['body'],
                ],
            ]);
    
            // Log the response from Firebase
            Log::info('FCM Response: ' . $response->body());
    
            // If response is not successful, log the error
            if (!$response->successful()) {
                Log::error('FCM notification failed: ' . $response->body());
            }
    
        } catch (\Exception $e) {
            Log::error('Error sending notification to user ID: ' . $notifiable->id, [
                'error' => $e->getMessage()
            ]);
        }
    }
    
    
}
