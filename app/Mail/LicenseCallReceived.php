<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class LicenseCallReceived extends Mailable
{
    use Queueable, SerializesModels;

    public $student;
    public $pdf;

    public function __construct($student,$pdf)
    {
        $this->student = $student;
        $this->pdf = $pdf;
    }

    public function build()
    {
        return $this->view('student.sendLicense')->with('student',$this->student)->attachData($this->pdf->output(),'carnet_estudiantil.pdf');
    }
}
