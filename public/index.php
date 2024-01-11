<?php

session_start();
include '../vendor/autoload.php';
require_once('../app/core/Router.php');

// Create an instance of the Router
$router = new Router();