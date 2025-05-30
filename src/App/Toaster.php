<?php

//////////  PHP - INHERITANCE EXPLAINED - IS INGERITANCE GOOD  //////////

// Php inheritance is an oop concept where one class can inherit properties and methods from another class

namespace App;

// final class Toaster // final keyword is used to restrict inheritance and method overriding
class Toaster
{
  // public int $size = 2;
  // private int $size = 2; // private size 2 will print 2 because on private i can't override public size 4 from ToasterPro child, i can only override public & protected property, method, constants.
  protected array $slices;
  protected int $size;

  public function __construct()
  {
    $this->slices = [];
    $this->size = 2;
  }

  // final public function addSlice(string $slice):void // final keyword is used to restrict inheritance and method overriding
  public function addSlice(string $slice): void
  {
    // var_dump($this); // if object creates from ToasterPro $this will point to it, if Toaster that $this will point to it
    // exit;

    if (count($this->slices) < $this->size) {
      $this->slices[] = $slice;
    }
  }

  public function toast()
  {
    foreach ($this->slices as $i => $slice) {
      // echo ($i + 1) . ': Toasting ' . $slice . PHP_EOL; // PHP_EOL is a predefined constant in php that stands for php end of line
      echo ($i + 1) . ': Toasting ' . $slice . '<br/>';
    }
  }

  // public function foo() {}
}
