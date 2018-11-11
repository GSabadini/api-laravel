<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ImportProductMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $title = 'Hello,';
        $message = 'Your products have been imported successfully';

        return $this
            ->from('gabriels.facina@gmail.com')
            ->subject($title)
            ->markdown(
                'email.import-products',
                compact('title', 'message')
            );
    }
}
