<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class GraficaEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $periodo;
    public $path;
    
    /**
     * Create a new message instance.
     */
    public function __construct($periodo, $path)
    {
        $this->periodo = $periodo;
        $this->path = $path;
    }

    /**
     * Build the message.
     */
    public function build(): void
    {
        $this->view('emails.grafica')
        ->attach($this->path, [
            'as' => 'grafica.png',
            'mime' => 'image/png',
        ])
        ->subject('Gráfica del período ' . $this->periodo);
    }
}
