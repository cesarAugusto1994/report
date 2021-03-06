<?php

use Doctrine\Common\Util\Debug;

require_once __DIR__.'/../vendor/autoload.php';

\Symfony\Component\Debug\Debug::enable();

$app = require __DIR__.'/../src/app.php';
require __DIR__.'/../config/dev.php';

$app->run();
