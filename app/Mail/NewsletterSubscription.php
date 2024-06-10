<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewsletterSubscription extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct()
    {
        //
    }
    public function build()
    {
        return $this->view('mail.sendMail')
        ->subject('Newsletter Subscription');
    }
    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Newsletter Subscription',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
{
    return new Content(
        view: 'mail.sendMail',  // Thay đổi tên thành 'mail.newsletter-subscription'
        // Hoặc bạn có thể cung cấp nội dung HTML trực tiếp:
        // 'body' => 'Cảm ơn bạn đã đăng ký bản tin của chúng tôi!',
    );
}

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
