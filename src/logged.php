<?php
/*
 * Procession authorization form
 * */
use controller\LoginController;

require_once __DIR__ . '/vendor/autoload.php';

$login = new LoginController();
$login->logged();