<?php

//////////  PHP - INHERITANCE EXPLAINED - IS INHERITANCE GOOD  //////////

namespace App;

class FancyOven
{
  public function __construct(private ToasterPro $toaster)
  {
    $this->toaster = $toaster;
  }

  public function fry() {}

  public function toast()
  {
    $this->toaster->toast();
  }

  public function toastBagel()
  {
    $this->toaster->toastBagel();
  }
}
