<?php


namespace Xtwoend\HyperfOtp\Services;


use Xtwoend\HyperfOtp\Events\OTPCreated;
use Xtwoend\HyperfOtp\Object\OtpRequestObject;
use Psr\EventDispatcher\EventDispatcherInterface;

class Transporter
{
    /**
     * @param OtpRequestObject $request
     * @param string $otp
     */
    public static function sendCode(OtpRequestObject $request, string $otp)
    {
        self::sendOverEmail($request, $otp);
        self::sendOverSMS($request, $otp);
        
        $event = make(EventDispatcherInterface::class);
        if($event) {
            $event->dispatch(new OTPCreated($request, $otp), 1);
        }
    }

    public static function sendOverEmail(OtpRequestObject $request, string $otp)
    {
        try {
            if (intval(config('otp.send-by.email')) === 1 && !empty($request->email)) {
                self::sendOver(new EmailTransportService($request->email, $otp));
            }
        } catch (\Throwable $ex) {
            return false;
            //dd($ex->getMessage());
        }
    }

    public static function sendOverSMS(OtpRequestObject $request, string $otp)
    {
        try {
            if (intval(config('otp.send-by.sms')) === 1 && !empty($request->number)) {
                self::sendOver(new SMSTransportService($request->number, $otp));
            }
        } catch (\Throwable $ex) {
            return false;
            //dd($ex->getMessage());
        }
    }

    public static function sendOver(TransportServiceInterface $service)
    {
        $service->send();
    }
}
