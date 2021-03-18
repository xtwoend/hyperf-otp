<?php

namespace Xtwoend\HyperfOtp\Services;

use HyperfExt\Mail\Mail;

class EmailTransportService implements TransportServiceInterface
{
    private $email;
    private $otp;

    public function __construct($email, $otp)
    {
        $this->email = $email;
        $this->otp = $otp;
    }

    public function send()
    {
        if (!empty($this->email) && !empty($this->otp)) {
            Mail::to($this->email)->send(new OtpMailable($this->otp));
        }
    }

}
