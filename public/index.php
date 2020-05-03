<?php
require '../config/host.php';
require '../vendor/autoload.php';
ini_set('display_errors',1); 
error_reporting(E_ALL);
session_start();
$router = new \App\config\Router();
$router->run();