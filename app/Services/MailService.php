<?php

namespace App\Services;

use Illuminate\Support\Facades\Mail;
use App\Mail\CheckoutCart as MailCheckoutCart;

class MailService
{
    public function sendMailCheckoutOrder($cart, $total)
    {
        Mail::to(request()->user())->send(new MailCheckoutCart($cart, $total));
    }
}
