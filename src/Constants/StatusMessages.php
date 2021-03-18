<?php


namespace Xtwoend\HyperfOtp\Constants;


final class StatusMessages
{
    const OTP_VERIFIED = 'OTP code verified';
    const SERVICE_UNAVAILABLE = 'Service Unavailable';
    const BAD_REQUEST = 'Bad Request';
    const RESEND_SERVICE_DISABLED = 'Resend Service is disabled';
    const SUCCESSFULLY_SENT_OTP = 'OTP Sent to the recipient';
    const TOO_MANY_WRONG_RETRY = 'Too Many Wrong Try';
    const INVALID_OTP_GIVEN = 'Invalid Otp';
    const OTP_TIMEOUT = 'Otp Expired/Timeout';
    const RESEND_EXCEEDED = 'Resend Exceeded';
}
