<?php declare(strict_types=1);

namespace App\Core;

interface ViewInterface
{
    public function init();

    /**
     * @param string $name
     * @param array $context
     *
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function render(string $name, array $context): void;
}
