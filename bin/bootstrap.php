<?php

declare(strict_types=1);
/**
 * Copyright (C) SPACE Platform PTY LTD - All Rights Reserved
 * Unauthorized copying of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 * Written by Nash Gao <nash@spaceplaform.co>.
 * @organization Space Platform
 */
use SpacePlatform\Utils\Flag\Native\EnvFlagEnum;
use SpacePlatform\Utils\Flag\Native\PlatformFlagEnum;
use SpacePlatform\Utils\Macro\Macro;

use function Hyperf\Support\env;

! defined('SERVER_NAME') && define('SERVER_NAME', 'space-analytics-server');
! defined('RPC_SERVER_NAME') && define('RPC_SERVER_NAME', 'space-analytics-rpc-server');
! defined('ENV') && define('ENV', serialize(EnvFlagEnum::parse(env('APP_ENV'))));
! defined('PLATFORM') && define('PLATFORM', serialize(PlatformFlagEnum::parse(env('PLATFORM'))));
! defined('TIME_ZONE') && define('TIME_ZONE', 'Australia/Brisbane');
! defined('PLATFORM') && define('PLATFORM', 'azure');

Macro::register('platform', new class() {
    private PlatformFlagEnum $enum;

    public function __invoke(): PlatformFlagEnum
    {
        if (! isset($this->enum)) {
            $this->enum = unserialize(PLATFORM);
        }

        return $this->enum;
    }
});

Macro::register('env', new class() {
    private EnvFlagEnum $enum;

    public function __invoke(): EnvFlagEnum
    {
        if (! isset($this->enum)) {
            $this->enum = unserialize(ENV);
        }

        return $this->enum;
    }
});

Macro::register('server_name', new class() {
    private string $server_name;

    public function __invoke(): string
    {
        if (! isset($this->server_name)) {
            $this->server_name = SERVER_NAME;
        }

        return $this->server_name;
    }
});
