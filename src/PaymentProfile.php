<?php

class PaymentProfile
{
  public int $id;

  public function __construct()
  {
    $this->id = rand(); // rand() func generates a random integer
  }
}
