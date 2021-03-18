<?php

namespace Xtwoend\HyperfOtp\Events;


class OTPCreated
{
    public $request;
    public $otp;

    public function __construct($request, $otp) 
    {
        $this->request = $request;
        $this->otp = $otp;
    }
}