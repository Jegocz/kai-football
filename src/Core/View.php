<?php declare(strict_types=1);

namespace App\Core;

use Twig\Environment;

class View implements ViewInterface
{
    private Environment $twig;

    /**
     * @return void
     */
    public function init(): void
    {
        $loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../templates/');
        $this->twig = new \Twig\Environment($loader);
    }

    /**
     * @param string $name
     * @param array $context
     *
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function render(string $name, array $context): void
    {
        echo $this->twig->render($name, $context);
    }
}
