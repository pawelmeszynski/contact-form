<?php

namespace App\Mail;

use App\Models\Email;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CustomerCreated extends Mailable
{
    use Queueable;
    use SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *git
     * @return $this
     */
    public function build()
    {
        return $this->from('noreply@sungroup.pl', 'Example')
            ->view('emails.index', [
                'emails' => Email::all()
            ]);
    }
}
