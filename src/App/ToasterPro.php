<?php

//////////  PHP - INHERITANCE EXPLAINED - IS INHERITANCE GOOD  //////////

namespace App;

// extend keyword is what you use when one class inherits from another class
class ToasterPro extends Toaster
{
  // public int $size = 4;
  // private int $size = 4; // i can't set private, protected in child class if in parent class public property/methods, but i can set if parent class contains protected property/methods and so on...

  // signature rule don't apply to __construct func, i can use diffirent types
  public function __construct()
  {
    parent::__construct(); // parent:: used to call the constructor of a parent class from a child class and i can also call methods or parent

    $this->size = 4;
  }

  // override methods on parent works with different $sliceX perameter but with name arguments not work 
  // public function addSlice(string $sliceX): void
  // {
  //   parent::addSlice($sliceX);
  // }

  // method signature should be compatible with parent method signature means same types int, string, :void, otherwise error 
  // public function addSlice(string $slice): void
  // {
  //   // parent::addSlice($slice);
  // }

  public function toastBagel()
  {
    foreach ($this->slices as $i => $slice) {
      echo ($i + 1) . ': Toasting ' . $slice . ' with bagels option' . '<br/>';
    }
  }

  // public function foo()
  // {
  //   throw new \Exception('Not Supported');
  // }
}
