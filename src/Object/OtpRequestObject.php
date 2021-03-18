<?php

namespace Xtwoend\HyperfOtp\Object;

use ParagonIE\ConstantTime\Base32;

class OtpRequestObject
{
    public $client_req_id;
    public $number;
    public $email;
    public $type;
    public $resend;
    public $secret;

    /**
     * OtpRequestObject constructor.
     * @param string $client_req_id
     * @param string $type
     * @param string|null $number
     * @param string|null $email
     * @param int|null $resend
     */
    public function __construct(string $client_req_id, string $type, ?string $number=null, ?string $email=null, ?int $resend=0, ?string $secret = null) {
        if(intval(config('otp.send-by.email')) === 1 && empty($email)) return null;
        if(intval(config('otp.send-by.sms')) === 1 && empty($number)) return null;
        
        $this->secret = $secret ?? Base32::encodeUpper(random_bytes(64));
        $this->client_req_id = $client_req_id;
        $this->number = $number;
        $this->email = $email;
        $this->type = $type;
        $this->resend = $resend;
    }
}


