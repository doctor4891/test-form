<?php


namespace helper;


use Twig\Loader\FilesystemLoader;

class Viewer
{
    public static function renderIt(){
        $loader = new FilesystemLoader(__DIR__ . '/../view');
        $twig = new \Twig\Environment($loader,['cache' => false]);

        echo $twig->render('index', ['name' => 'Fabien']);
    }
}