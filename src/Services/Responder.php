<?php


namespace Xtwoend\HyperfOtp\Services;


class Responder
{

    public $types = [
            'plain',
            'json'
        ];

    public static function formatter(array $data, $type = 0)
    {
        return $data;
    }


}
