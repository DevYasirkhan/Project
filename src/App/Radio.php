<?php

//////////  PHP ABSTRACTION CLASSES_METHODS  //////////

namespace App;

class Radio extends Boolean
{

  public function render(): string
  {
    return <<<HTML
    <input type="radio" name="{$this->name}" />
    HTML;
  }
}
