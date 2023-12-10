<?php

namespace App\controller;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use dockerphp\framework\Http\Response;

class BaseController {

    protected $twig;

    public function __construct() {
        $loader = new FilesystemLoader( __DIR__ . '/../../templates');
        $this->twig = new Environment($loader);
    }

    protected function render(string $template, array $data = []): Response {
        $template = $this->twig->render($template, $data);
        return new Response($template);
    }

    protected function startSession() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    protected function getSession(string $key) {
        return $_SESSION[$key] ?? null;
    }

    protected function setSession(string $key, $value) {
        $_SESSION[$key] = $value;

    }
}