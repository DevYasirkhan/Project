<?php


declare(strict_types=1);

namespace App;

use App\Exception\ViewNotFoundException;

class View
{
  public function __construct(protected string $view, protected array $params = []) {}

  public static function make(string $view, array $params = []): static
  {
    var_dump($view, $params);
    return new static($view, $params);
  }

  public function render(): string
  {
    $viewPath = VIEW_PATH . '/' . $this->view . '.php';

    if (! file_exists($viewPath)) {
      throw new ViewNotFoundException();
    }

    foreach ($this->params as $key => $value) {
      $$key = $value; // variable variable means $key value will be $key
    }

    // extract($this->params); // Import variables into the current symbol table from an array

    ob_start(); // Turn on output buffering

    include $viewPath;

    return (string) ob_get_clean(); // Get current buffer contents and delete current output buffer 
  }

  public function __toString(): string
  {
    return $this->render();
  }

  public function __get(string $name)
  {
    return $this->params[$name] ?? null;
  }
}
