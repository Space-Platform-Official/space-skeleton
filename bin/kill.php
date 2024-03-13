<?php

declare(strict_types=1);
/**
 * Copyright (C) SPACE Platform PTY LTD - All Rights Reserved
 * Unauthorized copying of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 * Written by Nash Gao <nash@spaceplaform.co>.
 * @organization Space Platform
 */
require dirname(__DIR__) . '/vendor/autoload.php';

use SpacePlatform\Utils\File\File;

use function Swoole\Coroutine\run;

run(
    function () {
        $pid = File::of(dirname(__DIR__) . '/runtime/hyperf.pid')->readFile();
        kill($pid);
    }
);
