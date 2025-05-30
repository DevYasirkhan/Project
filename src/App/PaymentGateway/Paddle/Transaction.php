<?php

declare(strict_types=1);

//////////  PHP NAMESPACE  //////////

// namespace paymentGeteway\Paddle;
// namespace App\PaymentGateway\Paddle;

// use DateTime;
// use Notification\Email; // 1 way

// use Vendor\Transaction; // not work error (name is already in use)
// use VendorName\Transaction as VendorTransaction; // works in Transaction class by give an alias/name
// use paymentGeteway\Stripe\Transaction as PaddleTransaction;


// class Transaction
// {
//   public function __construct()
// {
// var_dump(new CustomerProfile()); // it getting this class from current namespace PaymentGeteway\Paddle automatically
// var_dump(new DateTime()); // it also works without \, and \ load it from global namespace not local namespace

// var_dump(new Notification\Email()) // 1 way: qualified name, works with namespace and imports statements 
// var_dump(new Email()); // like this

// var_dump(new \Notification\Email()); // 2 way: Fully qualified name 

// var_dump(\explode(',', 'hello,world')); // it will point to local function instead of php builtin func explode() if explode local func exist, so prefix explode() func by \ global namespace
//   }
// }

// function explode($separator, $str)
// {
//   return 'foo';
// } // local function explode() will point to here


//////////  PHP CODING STANDARDS_AUTOLOADING(PSR-4) COMPOSER  //////////

// namespace App\PaymentGateway\Paddle;

// class Transaction {}


//////////  OBJECT ORIENTED PHP - CLASS CONSTANTS  //////////

// namespace App\PaymentGateway\Paddle;

// use App\Enums\Status;

// class Transaction
// {

//   private string $status;

//   public function __construct()
//   {
//     // $this->setStatus('pending'); // hard coding
//     $this->setStatus(Status::PENDING);

// var_dump(self::STATUS_PAID); // access private constant within class works, with Transaction, self, $this keyword, self keyword refers to class
//   }

//   public function setStatus(string $status): self
//   {
//     if (! isset(Status::ALL_STATUSES[$status])) {
// \InvalidArgumentException() is built in exception class used to indicate that a func or method recieved an argument that is not valid or not of the expected type or value
//       throw new \InvalidArgumentException('Invalid status');
//     }
//     $this->status = $status;

//     return $this;
//   }
// }


//////////  STATIC PROPERTIES_METHODS IN OBJECT ORIENTED PHP  //////////

// namespace App\PaymentGateway\Paddle;

// class Transaction
// {

//   // public static int $count = 0;
//   private static int $count = 0; // not access out, but with getCount() access

//   public function __construct(
//     public float $amount,
//     public string $description
//   ) {
//     self::$count++;
//   }

//   public static function getCount(): int
//   {
//     // echo $this->amount; // error
//     return self::$count;
//   }

//   public function process()
//   {
//     array_map(static function () {
//       // var_dump($this->amount);
//       $this->amount = 35;
//     }, [1]);

//     echo 'Processing paddle transaction...';
//   }
// }


//////////  PHP - ENCAPSULATION_ABSTRACTION  //////////

// namespace APP\PaymentGateway\Paddle;

// class Transaction
// {
//   private float $amount;

//   public function __construct(float $amount)
//   {
//     $this->amount = $amount;
//   }

//   // Transaction → the type of the parameter (i.e. must be a   Transaction object).
//   // $transaction → the name of the parameter (a variable name that you can use inside the method).

//   public function copyFrom(Transaction $transaction)
//   {
//     var_dump($transaction->amount, $transaction->sendEmail());
//   }

//   public function process()
//   {
//     echo 'Processing $' . $this->amount . ' transaction';

//     $this->generateReceipt();

//     // $this->sendEmail();
//   }

//   private function generateReceipt() {}

//   private function sendEmail()
//   {
//     return true;
//   }
// }
