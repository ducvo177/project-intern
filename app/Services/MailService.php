<?php

namespace App\Services;

use Illuminate\Support\Facades\Mail;
use App\Mail\CheckoutCart as MailCheckoutCart;

class MailService
{
    public function sendMailCheckoutOrder($user, $cart, $total)
    {
        Mail::to($user)->send(new MailCheckoutCart($cart, $total));
    }
}
