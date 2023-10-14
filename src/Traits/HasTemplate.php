<?php

namespace App\Traits;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Twig\Lexer;

trait HasTemplate
{
    private Environment $twig;

    public function __construct()
    {
        $loader = new FilesystemLoader(__DIR__ . '/../../resources/views');

        $this->twig = new Environment($loader);

        $lexer = new Lexer(
            $this->twig,
            [
                $this->helpers(),
            ]
        );

        $this->twig->setLexer($lexer);
    }

    public function view(string $view, array $data = []): string
    {
        return $this->twig->render($view, $data);
    }

    public function helpers()
    {
        [
            $this->twig->addFunction(new \Twig\TwigFunction('getCharacter', function (int $code) {
                return getCharacter($code);
            })),
            $this->twig->addFunction(new \Twig\TwigFunction('dd', function ($param) {
                return dd($param);
            })),
        ];
    }
}
