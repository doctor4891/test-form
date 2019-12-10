<?php
/*
 * view login form
 * */
use controller\LoginController;

require_once __DIR__ . '/vendor/autoload.php';
$login = new LoginController();
$login->index();