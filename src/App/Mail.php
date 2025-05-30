<?php

//////////  PHP TRAITS - HOW THEY WORK_DRAWBACKS  //////////

namespace App;

trait Mail {
  
  public function sendEmail() {
    echo 'Sending Email' . '<br/>';
  }
 }