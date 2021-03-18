<?php

namespace Xtwoend\HyperfOtp;

class ConfigProvider
{
    public function __invoke(): array
    {
        return [
            'dependencies' => [
                // 
            ],
            'annotations' => [
                'scan' => [
                    'paths' => [
                        __DIR__,
                    ],
                ],
            ],
            'publish' => [
                [
                    'id' => 'config',
                    'description' => 'The config for otp.',
                    'source' => __DIR__ . '/../publish/otp.php',
                    'destination' => BASE_PATH . '/publish/otp.php',
                ],
                [
                    'id' => 'migrations',
                    'description' => 'migrations',
                    'source' => __DIR__ . '/../migrations',
                    'destination' => BASE_PATH . '/migrations',
                ],
                [
                    'id' => 'template',
                    'description' => 'template stub',
                    'source' => __DIR__ . '/../template',
                    'destination' => BASE_PATH . '/template',
                ],
            ],
        ];
    }
}
