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


  ////////  PHP PDO PART 1,2,3 - PREPARED STATEMENTS - SQL INJECTION  //////////

  // PHP PDO (PHP Data Objects) is a database access layer providing a uniform method of access to multiple databases. It allows you to connect to different types of databases (MySQL, PostgreSQL, SQLite, etc.) using the same PHP functions and methods.

  public function index(): View
  {
    // 1) ///////////////////////////////////
    // try {
    //   $db = new PDO('mysql:host=db;dbname=my_db', 'root', 'root', [
    //     PDO::ATTR_EMULATE_PREPARES => false,
    //   ]);

    //   // $email = 'gio3@doe.com';
    //   // $name = 'Gio Doe';
    //   // $isActive = 1;
    //   // $createdAt = date('Y-m-d H:i:s', strtotime('05/30/2025 4:00PM'));

    //   // $query = 'INSERT INTO users (email, full_name, is_active, created_at, updated_at)
    //   // VALUES (:email, :name, :active, :date1, :date2)';

    //   // $stmt = $db->prepare($query);

    //   // $stmt->bindValue(':email', $email);
    //   // $stmt->bindValue(':name', $name);
    //   // $stmt->bindParam(':active', $isActive, PDO::PARAM_BOOL);
    //   // $stmt->bindValue(':date1', $createdAt);
    //   // $stmt->bindValue(':date2', $createdAt);

    //   // $stmt->execute();

    //   // $id = (int) $db->lastInsertId();
    //   $id = 3;

    //   $user = $db->query('SELECT * FROM users WHERE id = ' . $id)->fetch();

    //   echo '<pre>';
    //   var_dump($user);
    //   echo '</pre>';
    // } catch (\PDOException $e) {
    //   throw new \PDOException($e->getMessage(), (int) $e->getCode());
    // }

    // 2) ////////  PHP PDO PART 2 Transactions - Env variables_PhpDotEnv  //////////
    // Transactions are used to make sure a group of operations either all succeed or all fail - ensuring database consistency

    // Env: instead of hardcoding credentials (e.g. DB user/pass), use environment variables to keep sensitive info safe like create .env file, use library, load .env in php file 

    try {
      $db = new PDO('mysql:host=' . $_ENV['DB_HOST'] . ';dbname=' . $_ENV['DB_DATABASE'], $_ENV['DB_USER'], $_ENV['DB_PASS']);
    } catch (\PDOException $e) {
      throw new \PDOException($e->getMessage(), (int) $e->getCode());
    }

    $email = 'j@doe.com';
    $name = 'Jane Doe';
    $amount = 25;

    try {
      $db->beginTransaction();

      $newUserStmt = $db->prepare(
        'INSERT INTO users (email, full_name, is_active, created_at)
         VALUES (?, ?, 1, NOW())'
      );

      $newInvoiceStmt = $db->prepare(
        'INSERT INTO invoices (amount, user_id)
         VALUES (?, ?)'
      );

      $newUserStmt->execute([$email, $name]);

      $userId = (int) $db->lastInsertId();

      throw new \Exception('Test');
      $newInvoiceStmt->execute([$amount, $userId]);

      $db->commit();
    } catch (\Throwable $e) {
      if ($db->inTransaction()) {
        $db->rollBack();
      }
    }

    $fetchStmt = $db->prepare(
      'SELECT invoices.id AS invoice_id, amount, user_id, full_name
       FROM invoices
       INNER JOIN users ON user_id = users.id
       WHERE email = ?'
    );

    $fetchStmt->execute([$email]);

    echo '<pre>';
    var_dump($fetchStmt->fetch(PDO::FETCH_ASSOC));
    echo '</pre>';

    return View::make('index');
  }
}
