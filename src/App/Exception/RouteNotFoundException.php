<?php

//////////  PHP SUPERGLOBALS - BASIC ROUTING USING THE SERVER INFO  //////////

namespace App\Exception;

class RouteNotFoundException extends \Exception
{

  protected $message = '404 not found';
}
