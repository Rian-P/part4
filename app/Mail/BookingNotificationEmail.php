<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BookingNotificationEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $bookingData;

    /**
     * Create a new message instance.
     *
     * @param  array  $bookingData The data to be passed to the email template
     *                          This can include the booking information.
     */
    public function __construct($bookingData)
    {
        $this->bookingData = $bookingData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.booking_notification')
            ->with($this->bookingData);
    }
}
