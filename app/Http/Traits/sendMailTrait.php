<?php
namespace App\Http\Traits;
use Mail;
use App\Mail\SubscriptionMail;
use App\Mail\ContactMail;
use App\Mail\ApplyMail;
use App\Mail\OfferMail;
use App\Mail\ActionMail;
use App\Mail\PaymentMail;

trait sendMailTrait {

    public function sendPayment($to /*Recipient*/)
    {
        Mail::to($to)->send(new PaymentMail());
    }

}
