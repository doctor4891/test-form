<?php


namespace helper;


use Twig\Environment;
use Twig\Loader\FilesystemLoader;

/**
 * Class Twig
 * @package helper
 */
class Twig
{
    /**
     * @param $template
     * @param $variables
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     * Render template
     */
    public static function view($template, $variables)
    {
        $loader = new FilesystemLoader(__DIR__ . '/../view');
        $twig = new Environment($loader, ['cache' => false]);

        echo $twig->render($template, $variables);
    }
}