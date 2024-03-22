<?php

namespace App;

use App\Request;
use PDO;

class Router {
    protected $routes = [];
    protected $request;
    protected $pdo;

    public function __construct(Request $request, PDO $pdo) {
        $this->request = $request;
        $this->pdo = $pdo;

        // Cargar las rutas desde el archivo routes.php
        $this->routes = require 'routes.php';
    }

    public function route() {
        $uri = $this->request->uri();
        $method = $this->request->method();

        // Buscar la ruta correspondiente en base al método y la URI
        if (isset($this->routes[$method][$uri])) {
            $handler = $this->routes[$method][$uri];
            list($controller, $action) = $handler;

            // Crear una instancia del controlador y llamar al método correspondiente
            $controllerInstance = new $controller($this->pdo, $this->request);
            $controllerInstance->$action($this->request);
        } else {
            // Ruta no encontrada
            echo "404 Not Found";
        }
    }
}









