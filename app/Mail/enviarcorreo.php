<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class enviarcorreo extends Mailable
{
    use Queueable, SerializesModels;

    public $cliente;
    public $pdfContent;

    public function __construct($cliente, $pdfContent)
    {
        $this->cliente = $cliente;
        $this->pdfContent = $pdfContent;
    }

    public function build()
    {
        return $this
            ->subject('Factura de entrega de pedido papelería universal')
            ->view('entregas.envio-correo')
            ->attachData($this->pdfContent, 'recibo_universal.pdf', [
                'mime' => 'application/pdf',
            ]);
    }
}
