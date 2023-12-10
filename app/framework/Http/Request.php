<?php

namespace dockerphp\framework\Http;

class Request
{
    public readonly array $getParams;
    public readonly array $setParams;
    public readonly array $cookies;
    public readonly array $files;
    public readonly array $server;
    public readonly array $request;

    public function __construct(array $getParams, array $setParams, array $cookies, array $files, array $server, array $request) {
        $this->getParams = $getParams;
        $this->setParams = $setParams;
        $this->cookies = $cookies;
        $this->files = $files;
        $this->server = $server;
        $this->request = $request; // Add this line to assign the value of $request
    }

    public static function createFromGlobals() {
        return new static(
            $_GET,
            $_POST,
            $_COOKIE,
            $_FILES,
            $_SERVER,
            $_REQUEST
        );
    }

    public function get(string $key, $default = null) {
        return $_REQUEST[$key] ?? $default;
    }

    public function getPath(): string {
        $uri = $this->server['REQUEST_URI'];
        $path = parse_url($uri, PHP_URL_PATH);
        return $path;
    }

    public function getMethod(): string {
        $method = $this->server['REQUEST_METHOD'];
        return $method;
    }
}