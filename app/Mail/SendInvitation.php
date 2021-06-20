<?php

namespace App\Mail;

use App\Contract;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendInvitation extends Mailable
{
    use Queueable, SerializesModels;

    public $contract;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Contract $contract)
    {
        $this->contract = $contract;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.sendInvitation');
        // ->with([
        //     'signerOne' => $this->contract->signerOne,
        //     'emailOne' => $this->contract->emailOne,
        //     'signerTwo' => $this->contract->signerTwo,
        //     'emailTwo' => $this->contract->emailTwo,
        //     'file_path' => $this->contract->file_path

        // ]);
    }
}
