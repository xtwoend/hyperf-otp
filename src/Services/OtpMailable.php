<?php

namespace Xtwoend\HyperfOtp\Services;

use HyperfExt\Mail\Mailable;


class OtpMailable extends Mailable
{
    public $otp;

    public function __construct($otp)
    {
        $this->otp = $otp;
    }

    public function build()
    {
        return $this->from(config('otp.email.from'),config('otp.email.name'))
            ->view(BASE_PATH . '/template/email.stub')
            ->subject(config('otp.email.subject'));
    }
}
