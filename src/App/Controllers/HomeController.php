<?php

declare(strict_types=1);

//////////  PHP SUPERGLOBALS - BASIC ROUTING USING THE SERVER INFO  //////////

namespace App\Controllers;

use App\View;
use PDO;

class HomeController
{

  // public function index(): View
  // {
  //   // return 'Home';

  //   return View::make('index', ['foo' => 'bar']);
  // }

  // public function download()
  // {
  //   header('Content-Type: application/pdf');
  //   header('Content-Disposition: attachment;filename="myfile.pdf');

  //   readfile(STORAGE_PATH . '/icomoon-1');
  // }

  // public function upload()
  // {
  //   $filePath = STORAGE_PATH . '/' . $_FILES['receipt']['name'];

  //   move_uploaded_file(
  //     $_FILES['receipt']['tmp_name'],
  //     $filePath
  //   ); // Moves an uploaded file to a new location

  //   // echo '<pre>';
  //   // var_dump(pathinfo($filePath)); // Returns information about a file path
  //   // echo '</pre>';
  //   header('Location: /');
  // }


  ////////  PHP PDO PART 1 - PREPARED STATEMENTS - SQL INJECTION  //////////

  // PHP PDO (PHP Data Objects) is a database access layer providing a uniform method of access to multiple databases. It allows you to connect to different types of databases (MySQL, PostgreSQL, SQLite, etc.) using the same PHP functions and methods.

  public function index(): View
  {
    try {
      $db = new PDO('mysql:host=db;dbname=my_db', 'Yasir', 'Jhonvicky11111', []);

      $email = 'gio1@doe.com';
      $name = 'Gio Doe';
      $isActive = 1;
      $createdAt = date('Y-m-d H:i:s', strtotime('05/29/2025 4:00PM'));

      $query = 'INSERT INTO users (email, full_name, is_active, created_at, updated_at)
      VALUES (:email, :name, :active, :date1, :date2)';

      $stmt = $db->prepare($query);

      $stmt->bindValue(':email', $email);
      $stmt->bindValue(':name', $name);
      $stmt->bindParam(':active', $isActive, PDO::PARAM_BOOL);
      $stmt->bindValue(':date1', $createdAt);
      $stmt->bindValue(':date2', $createdAt);

      $isActive = 0;
      $name = 'foo bar';

      $stmt->execute();

      $id = (int) $db->lastInsertId();

      $user = $db->query('SELECT * FROM users WHERE id = ' . $id)->fetch();

      echo '<pre>';
      var_dump($user);
      var_dump($id);
      echo '</pre>';
    } catch (\PDOException $e) {
      var_dump($e->getCode());
      throw new \PDOException($e->getMessage(), (int) $e->getCode());
    }

    return View::make('index');
  }
}
