<?php
// index.php

require '../bootstrap.php';
use App\Request;
use App\Router;

$request = new Request();
$pdo = new PDO('mysql:host=localhost;dbname=m7_curl', 'root', ''); 
$router = new Router($request, $pdo); 
$router->route();


