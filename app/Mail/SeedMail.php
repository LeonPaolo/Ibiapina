<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SeedMail extends Mailable
{
    use Queueable, SerializesModels;
    protected $cliente;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($cliente)
    {
         $this->cliente = $cliente;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.newMessage')
        ->with([

            'nome' => $this->cliente->nome,
            'email' => $this->cliente->email,
            'datahora' =>now()->format('d/m/Y H:i:s'),
            'mensagem' => $this->cliente->mensagem,
           
        ])->subject('Contato Cliente Site');
        
    }
}
