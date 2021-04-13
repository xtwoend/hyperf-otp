<?php


namespace Xtwoend\HyperfOtp\Constants;


final class StatusCodes
{
    const SERVICE_UNAVAILABLE       = 201001;
    const BAD_REQUEST               = 201002;
    const RESEND_SERVICE_DISABLED   = 201003;
    const SUCCESSFULLY_SENT_OTP     = 201004;
    const OTP_VERIFIED              = 201005;
    const TOO_MANY_WRONG_RETRY      = 201006;
    const RESEND_EXCEEDED           = 201007;
    const INVALID_OTP_GIVEN         = 201008;
    const OTP_TIMEOUT               = 201009;
}
