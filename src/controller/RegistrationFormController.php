<?php


namespace controller;


use helper\Twig;

class FormController
{
    public function index(){
        Twig::view('registrationForm.html.twig',['title' => 'User Form']);
    }
}