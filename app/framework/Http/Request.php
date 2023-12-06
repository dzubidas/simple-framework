<?php

namespace dockerphp\framework\Http;

class Request
{
    public readonly array $getParams;
    public readonly array $setParams;
    public readonly array $cookies;
    public readonly array $files;
    public readonly array $server;

    public function __construct(array $getParams, array $setParams, array $cookies, array $files, array $server) {
        $this->getParams = $getParams;
        $this->setParams = $setParams;
        $this->cookies = $cookies;
        $this->files = $files;
        $this->server = $server;
    }

    public static function createFromGlobals() {
        return new static(
            $_GET,
            $_POST,
            $_COOKIE,
            $_FILES,
            $_SERVER
        );
    }
}