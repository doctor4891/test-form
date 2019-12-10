<?php


namespace controller;


use helper\Cookies;
use helper\CSRF;
use helper\Errors;
use helper\Http;
use helper\Twig;
use helper\Validate;
use model\User;

/**
 * Class LoginController
 * @package controller
 */
class LoginController
{
    /**
     * View authorization form
     */
    public function index()
    {
        Cookies::getInstance()->removeParam('user');
        Twig::view('login.html.twig', [
            'csrf' => CSRF::generate()
        ]);
    }

    /**
     * Processing authorization data
     */
    public function logged()
    {
        if (Validate::loginForm()) {
            $cookie = Cookies::getInstance()->setUser();
            User::getInstance()->updateUserCookie($cookie, $_POST['login']);
            Http::redirect('/profile.php');
        } else {
            Twig::view('login.html.twig', [
                'csrf' => CSRF::generate(),
                'errors' => Errors::$jar
            ]);
        }
    }

    /**
     *  Processing logout
     */
    public function logOut()
    {
        Cookies::getInstance()->removeParam('user');
        Http::redirect('/login.php');
    }
}