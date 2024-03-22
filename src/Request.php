<?php
namespace App;

class Request {
    protected string $uri;
    protected string $method;

    public function __construct() {
        $this->uri = $_SERVER['REQUEST_URI'];
        $this->method = $_SERVER['REQUEST_METHOD'];
    }

    public function uri(): string {
        return $this->uri;
    }
    public function method(): string {
        return $this->method;
    }
}
