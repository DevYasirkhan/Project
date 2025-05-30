<?php

//////////  STATIC PROPERTIES_METHODS IN OBJECT ORIENTED PHP  //////////

namespace App;

class DB
{

  // private static ?DB $instance = null;
  public static ?DB $instance = null; // DB: This means the variable must be of type DB (an instance of the DB class), ?DB: This property can either be an instance of the DB class or null

  private function __construct(
    public array $config
  ) {
    echo 'Instance Created<br/>';
  }

  public static function getInstance(array $config): DB
  {
    if (self::$instance === null) {
      self::$instance = new DB($config);
    }

    return self::$instance;
  }
}
