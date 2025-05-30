<?php

class Customer
{
  // public ?PaymentProfile $paymentProfile = null; // ? indicate that this property can be either an instance of PaymentProfile or null
  private ?PaymentProfile $paymentProfile = null;

  public function getPaymentProfile(): ?PaymentProfile
  {
    return $this->paymentProfile;
  }
}
