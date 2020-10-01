<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReporteDiarioGastos extends Mailable
{
    use Queueable, SerializesModels;

    public $total_gastos, $total_innecesario, $total_necesario, $nombre;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($total_gastos, $total_innecesario, $total_necesario, $nombre)
    {
        $this->total_gastos = $total_gastos;
        $this->total_innecesario = $total_innecesario;
        $this->total_necesario = $total_necesario;
        $this->nombre = $nombre;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.reporteDiario');
    }
}
