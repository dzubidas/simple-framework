<?php

use App\controller\HomeController;
use App\controller\PostController;
use App\controller\FormController;

return [
    ['GET', '/', [HomeController::class, 'index']],
    ['GET', '/home', [HomeController::class, 'index']],
    ['GET', '/post/{id:\d+}', [PostController::class, 'show']],
    ['GET', '/form', [FormController::class, 'form']],
    ['POST', '/form', [FormController::class, 'submit']]
];