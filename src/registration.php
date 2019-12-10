<?php

use controller\RegistrationFormController;

require_once __DIR__ . '/vendor/autoload.php';
$form = new RegistrationFormController();
$form->index();