<?php

namespace Oira;

class TemplateFactory {
    private $base_directory;

    public function __construct(string $base_directory) {
        $this->base_directory = rtrim($base_directory, '/\\');
    }

    public function create(string $name, array $params = []): Template {
        $file = "{$this->base_directory}/_base.phtml";
        return new Template(
            $file,
            [
                'main' => "{$this->base_directory}/{$name}.phtml"
            ] + $params
        );
    }
}
