<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CheckoutCart extends Mailable implements ShouldQueue
{
    use Queueable;
    use SerializesModels;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $cart;
    protected $total;
    public function __construct($cart, $total)
    {
        $this->cart = $cart;
        $this->total = $total;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Checkout Cart',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            markdown: 'mail.checkout',
            with: [
                'cart' => $this->cart,
                'total' => $this->total,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
