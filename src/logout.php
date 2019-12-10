<?php
/*
 * Logout
 * */
use controller\LoginController;

require_once __DIR__ . '/vendor/autoload.php';
(new LoginController())->logOut();