<?php

declare(strict_types=1);
/**
 * Copyright (C) SPACE Platform PTY LTD - All Rights Reserved
 * Unauthorized copying of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 * Written by Nash Gao <nash@spaceplaform.co>.
 * @organization Space Platform
 */
use Hyperf\Contract\StdoutLoggerInterface;
use Psr\Log\LogLevel;
use SpacePlatform\Utils\Flag\Native\EnvFlagEnum;
use SpacePlatform\Utils\Macro\Macro;

use function Hyperf\Support\env;

return [
    'app_name' => env('APP_NAME', SERVER_NAME),
    'app_env' => env('APP_ENV', Macro::call('env')?->getValue() ?? EnvFlagEnum::DEVELOPMENT),
    'scan_cacheable' => env('SCAN_CACHEABLE', false),
    StdoutLoggerInterface::class => [
        'log_level' => [
            LogLevel::ALERT,
            LogLevel::CRITICAL,
            LogLevel::DEBUG,
            LogLevel::EMERGENCY,
            LogLevel::ERROR,
            LogLevel::INFO,
            LogLevel::NOTICE,
            LogLevel::WARNING,
        ],
    ],
];
