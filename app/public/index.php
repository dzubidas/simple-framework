<?php

declare(strict_types=1);

use dockerphp\framework\Http\Request;
use dockerphp\framework\Http\Response;
use dockerphp\framework\Http\HttpKernel;

define('BASE_PATH', dirname(__DIR__));
define('ROOT_PATH', dirname(__FILE__). DIRECTORY_SEPARATOR);

require_once dirname(__DIR__) . '/vendor/autoload.php';

$request = Request::createFromGlobals();
$kernel = new HttpKernel();

$response = $kernel->handle($request);
$response->send();
