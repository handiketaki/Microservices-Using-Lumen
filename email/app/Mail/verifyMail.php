<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Traits\ApiResponser;
use App\Notifications\UserRegistrationNotification;

class verifyMail extends Mailable
{
    use Queueable, SerializesModels;
    use ApiResponser;

    /**
     * The order instance.
     *
     * @var Order
     */
    public $order;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $user_data = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
       return $this->notify(new UserRegistrationNotification($user_data));
       // return $this->successResponse("Please check your inbox for mail verification.", Response::HTTP_OK); 
    }
}