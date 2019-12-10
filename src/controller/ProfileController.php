<?php


namespace controller;


use helper\Cookies;
use helper\Http;
use helper\Twig;
use model\User;

class ProfileController
{
    public function index(){
            $userCookie = Cookies::getInstance()->getParam('user');

            if(!$userCookie){
                Http::redirect('/login.php');
            }
            $user = User::getInstance()->getUserByCookie($userCookie);
            if($user)
            {
                Twig::view('profile.html.twig',[
                    'UserLogin' => $user['UserLogin'],
                    'UserEmail' => $user['UserEmail'],
                    'UserPic' => $user['UserPic']
                ]);
            }else{
                Http::redirect('/registration.php');
            }
    }
}