<?php

/*
 * processing after user registered
 * */

use controller\RegistrationFormController;

require_once __DIR__ . '/vendor/autoload.php';

$registered = new RegistrationFormController();

$registered->registered();