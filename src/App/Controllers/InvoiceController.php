<?php

declare(strict_types=1);

//////////  PHP SUPERGLOBALS - BASIC ROUTING USING THE SERVER INFO  //////////

namespace App\Controllers;

use App\View;

class InvoiceController
{

  public function index(): View
  {
    // setcookie(
    //   'userame',
    //   'Gio',
    //   time() - 10 // i can also set [] array
    // ); // Send a cookie

    return View::make('invoices/index');
  }

  public function create(): View
  {
    return View::make('invoices/create');
  }

  public function store()
  {
    $amount = $_POST['amount'];

    var_dump($amount);
  }
}
