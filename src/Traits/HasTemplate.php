<?php

namespace App\Traits;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

trait HasTemplate
{
    private Environment $twig;

    public function __construct()
    {
        $loader = new FilesystemLoader(VIEWS_DIR);

        $this->twig = new Environment($loader);
    }

    public function view(string $view, array $data): string
    {
        return $this->twig->render($view, $data);
    }
}
