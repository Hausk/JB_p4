<?php
require '../config/host.php';
require '../vendor/autoload.php';
session_start();
$router = new \App\config\Router();
$router->run();