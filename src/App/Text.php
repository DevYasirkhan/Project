<?php

//////////  PHP ABSTRACTION CLASSES_METHODS  //////////

namespace App;

class Text extends Field
{

  public function render($x = 1): string // i can declare $x = 1 
  {
    return <<<HTML
   <input type="text" name="{$this->name}" />
   HTML;
  }
}
