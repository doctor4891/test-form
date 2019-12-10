<?php
/*
 * View user profile
 * */
use controller\ProfileController;

require_once __DIR__ . '/vendor/autoload.php';

$profile = new ProfileController();
$profile->index();