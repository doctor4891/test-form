<?php


namespace controller;

use helper\Cookies;
use helper\CSRF;
use helper\Errors;
use helper\Http;
use helper\Password;
use helper\Twig;
use helper\UserPic;
use helper\Validate;
use model\User;

class RegistrationFormController
{
    public function index()
    {
        Twig::view('registration.html.twig', [
            'csrf' => CSRF::generate(),
            'errors' => Errors::$jar
        ]);
    }

    public function registered()
    {
        if (Validate::registerForm()) {
            $userPic = new UserPic($_FILES['userpic'], $_POST['login']);
            $userPic->store();
            User::getInstance()->addUser(
                $_POST['login'],
                Password::encrypt($_POST['password']),
                $_POST['email'],
                Cookies::getInstance()->setUser(),
                $userPic->path()
            );
           Http::redirect('/profile.php');
        } else {
           $this->index();
        }
    }
}