<?php

declare(strict_types=1);

use dockerphp\framework\Http\Request;
use dockerphp\framework\Http\Response;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$request = Request::createFromGlobals();

$content = '<h1>Hello World!</h1>';
$response = new Response(content: $content, status: 200, headers: []);
$response->send();

// dd($request);