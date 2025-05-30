<?php

declare(strict_types=1);

use App\Exception\RouteNotFoundException;
use Ramsey\Collection\Collection;

//////////  PHP CLASSES_ OBJECTS - TYPED PROPERTIES - CONSTRUCTORS_DESTRUCTORS  //////////

// require_once '../Transaction.php';

// $transaction = new Transaction(100, 'Transaction 1'); 

// $transaction->amount = 15; // assigning value

// $transaction->addTax(8);
// $transaction->applyDiscount(10);

// $transaction->addTax(8)->applyDiscount(10); // chain multiple methods 

// $class = 'Transaction';
// $amount = (new $class(100, 'Transaction 1'))

// $transaction = (new Transaction(100, 'Transaction 1'))
//     ->addTax(8)
//     ->applyDiscount(10);
//     ->getAmount();

// var_dump($transaction->amount); // don't use $ sign to access variable of class
// var_dump($transaction->getAmount()); // return private method
// var_dump($amount); 

// $amount = $transaction->getAmount();

// unset($transaction);
// $transaction = null;
// exit; // __destruct will still run

// var_dump($amount);


// $str = '{"a":1, "b":2, "c":3}';

// $arr = json_decode($str, true); // decode a JSON string into a variable, if true result will associative arr if false or no perameter result will object so i can then access it 
// $arr = json_decode($str); 

// var_dump($arr); 
// var_dump($arr->a); 

// $obj = new \stdClass(); // \stdClass() is the generic empty class used when casting to an obj or when decoding JSON into an obj using json_decode() 

// $obj->a = 1;
// $obj->b = 2;

// var_dump($obj);

// $arr = [1, 2, 3];
// $obj = (object) $arr;

// var_dump($obj->{0});

// $obj = (object) 1;
// $obj = (object) true;
// var_dump($obj->scalar);
// $obj = (object) null; // null will empty obj
// var_dump($obj); 


//////////  CONSTRUCTOR PROPERTY PROMOTION - NULLSAFE OPERATOR  //////////

// require_once '../PaymentProfile.php';
// require_once '../Customer.php';
// require_once '../Transaction.php';

// $transaction = new Transaction(5, 'Test');

// $transaction->customer = new Customer();

// Nullsafe operator (?->) is used to access properties or methods of an obj without throwing a null reference error if the obj is null
// echo $transaction->customer?->paymentProfile?->id ?? 'foo'; 
// echo $transaction->getCustomer()?->getPaymentProfile()?->id; // The null coalescing operator (??) returns the first operand if it exists and is not null, otherwise it returs the second operand 

// $profileId = null;

// if ($customer = $transaction->getCustomer()) {
//     if ($paymentProfile = $customer->getPaymentProfile()) {
//         $profileId = $paymentProfile->id;
//     }
// }

// echo $profileId;

// echo $transaction->getCustomer()?->getPaymentProfile()?->id;
// echo $transaction->getCustomer()?->setPaymentProfile(createProfile())?->id; // will be error


//////////  PHP NAMESPACE  //////////

// Namespace is a way to encapsulate items such as classes, interfaces, function, and constants to avoid name collisions and to organize code better

// I can't declare class Transaction because name is already in use, also functions, variables, but if use with namespace then works
// require_once '../paymentGateway/Stripe/Transaction.php';
// require_once '../Notification/Email.php';
// require_once '../paymentGateway/Paddle/CustomerProfile.php';
// require_once '../paymentGateway/Paddle/Transaction.php';

// var_dump(new paymentGateway\stripe\Transaction());

// I can also import (or alias) classes from other namespaces using use keyword, & good for func, const, imports
// use PaymentGateway\Paddle\Transaction;
// use PaymentGateway\Stripe\Transaction as StripeTransaction; // give alias/name with AS/as keyword to use both Transaction with diffirent names otherwise error (name already in use)
// use function PaymentGateway\Stripe\Transaction;
// use cosnt PaymentGateway\Stripe\Transaction;
// use PaymentGateway\Paddle\CustomerProfile;

// use PaymentGateway\Paddle\{Transaction, CustomerProfile}; // Multiple imports in 1 line in {}
// use PaymentGateway\Paddle; // also this works and good for alot imports
// use PaymentGateway\Paddle as PA;

// var_dump(new Transaction());

// $paddleTransaction = new Paddle\Transaction();
// $stripeTransaction = new StripeTransaction();
// $paddleCustomerProfile = new Paddle\CustomerProfile();

// $paddleTransaction = new PA\Transaction();
// $paddleCustomerProfile = new PA\CustomerProfile();

// var_dump($paddleCustomerProfile, $paddleTransaction, $stripeTransaction);

// include('views/layout.php'); // if i want to use StriptTransaction class in include i would import it up as well


//////////  PHP CODING STANDARDS_AUTOLOADING(PSR-4) COMPOSER  //////////

// PSR-4 is a standard that maps php namespaces to directory paths. it allows composer to autolod classes based on their namespace and file location 

// require_once '../app/PaymentGateway/Stripe/Transaction.php';
// require_once '../app/Notification/Email.php';
// require_once '../app/PaymentGateway/Paddle/CustomerProfile.php';
// require_once '../app/PaymentGateway/Paddle/Transaction.php';

// spl_autoload_register(function ($class) {
// $path = __DIR__ . '/../' . lcfirst(str_replace('\\', '/', $class) . '.php'); // Make a string's first character lowercase

// if (file_exists($path)) {
//   require $path; // not work error, but works with __DIR__
// }


// var_dump('Autoloader 1');
// }); // Thsi is a native func that lets you register your own autoloading logic 

// spl_autoload_register(function ($class) {
//   var_dump('Autoloader 2');
// }, prepend: true); // If true, spl_autoload_register() will prepend the autoloader on the autoload stack instead of appending it.

// require __DIR__ . '/../vendor/autoload.php';

// use App\PaymentGateway\Paddle\Transaction;

// $paddleTransaction = new Transaction();

// $id = new \Ramsey\Uuid\UuidFactory();

// echo $id->uuid4();

// var_dump($paddleTransaction);


//////////  OBJECT ORIENTED PHP - CLASS CONSTANTS  //////////

// Object oriented programming (oop) is a way of organizing code using objects and classes, instead of writing everything in one long script

// A class constant is a value that:
// Belongs to the class itself (not to any object), cannot be changed, and often used for values that should stay the same (e.g., settings, version numbers, status codes) 

// public: means it can be accessed from outside.
// protected: and private: limit access (like in methods/properties)

// use App\PaymentGateway\Paddle\Transaction;
// use App\Enums\Status;

// require_once __DIR__ . '/../vendor/autoload.php';

// $transaction = new Transaction();

// Use the :: double column (scope resolution operator) to access it
// echo Transaction::STATUS_PAID; 
// echo $transaction::STATUS_PAID;

// echo Transaction::class;
// echo $transaction::class; // The ::class magic constant gives you the fully qualified class name of an object or class.

// $transaction->setStatus('awerawrwa'); // work but can create bugs so use constants in class like const PAID = 'paid';
// $transaction->setStatus(Transaction::STATUS_PAID); don't pass constants 

// $transaction->setStatus(Status::PAID);
// var_dump($transaction);


//////////  STATIC PROPERTIES_METHODS IN OBJECT ORIENTED PHP  //////////

// static properties and methods are members of a class that belong to the class itself, rather than to instances (objects) of the class. Here's a quick breakdown:

// static property is shared by all instances of a class, you access it using the class name, not an object.
// static method does not depend on object data, it's called using the class name and cannot access this or self in the traditional instance sense, used for utility functions or logic related to the class

// use App\DB;
// use App\PaymentGateway\Paddle\Transaction;

// require_once __DIR__ . '/../vendor/autoload.php';

// $transaction = new Transaction(25, 'Transaction 1');

// var_dump(Transaction::$count); // not access private $count
// var_dump(Transaction::getCount()); // access private $count with method
// var_dump($transaction::process()); // error can't be called statically

// $db = new DB(); // not accessible because instance is null but print str in __construct func with public not with private 
// $db = DB::getInstance([]); // accessible to call getInstance()

// var_dump($transaction->getCount()); // not recommended & can't access the this keyword in getCount()
// $transaction->process();
// var_dump($transaction->amount);

// var_dump($transaction::getCount());


//////////  PHP - ENCAPSULATION_ABSTRACTION  //////////

// Encapsulation means hiding the internal details of a class and only allowing access through public methods

// Abstraction is the concept of hiding complex implementation details and showing only the necessary features of an object

// use App\PaymentGateway\Paddle\Transaction;

// require_once __DIR__ . '/../vendor/autoload.php';

// $transaction = new Transaction(25);
// $transaction->amount = 125; // amount value changed, not encapsulated

// ReflectionProperty is a class from the reflection api that lets you inspect and manipulate class properties at runtime
// $reflectionProperty = new ReflectionProperty(Transaction::class, 'amount');
// $reflectionProperty->setAccessible(true);
// $reflectionProperty->setValue($transaction, 125); // also can modify property
// var_dump($reflectionProperty->getValue($transaction));

// $transaction->copyFrom(new Transaction(100));
// $transaction->process();


//////////  PHP - INHERITANCE EXPLAINED - IS INGERITANCE GOOD  //////////

// use App\Toaster;
// use App\ToasterPro;

// require_once __DIR__ . '/../vendor/autoload.php';

// $toaster = new Toaster();
// $toaster = new ToasterPro();

// $toaster->addSlice(slice: 'bread'); // named argument
// $toaster->addSlice('bread');
// $toaster->addSlice('bread');
// $toaster->addSlice('bread');
// $toaster->addSlice('bread');
// $toaster->addSlice('bread');

// $toaster->toast();
// $toaster->toastBagel();
// $toaster->foo();

// foo($toaster);

// function foo(Toaster $toaster)
// {
// $toaster->toast();
// $toaster->toastBagel();  
// }


//////////  PHP ABSTRACTION CLASSES_METHODS  //////////

// Php abstract classes and methods are used when you want to define a base class that can't be instantiated on its own, but can provide a template for other classes
// abstraction methods must be implemented by child classes 

// require_once __DIR__ . '/../vendor/autoload.php';

// $fields = [
//   new \App\Text('textField'),
//   new \App\Checkbox('checkboxField'),
//   new \App\Radio('radioField'),
// ];

// foreach ($fields as $field) {
//   echo $field->render() . '<br/>';
// }


//////////  PHP INTERFACES_POLYMORPHISM  INTERFACES EXPLAINED  //////////

// Php interface is a contract that specifies a set of methods that must be implemented by any class that implements it 

// require_once __DIR__ . '/../vendor/autoload.php';

// $collector = new \App\CollectionAgency();
// echo $collector->collect(100) . PHP_EOL;

// $service = new \App\DebtCollectionService();

// echo $service->collectDebt(new \App\CollectionAgency()) . PHP_EOL;
// echo $service->collectDebt(new \App\Rocky()) . PHP_EOL;
// echo $service->collectDebt(new \App\CollectionAgency()) . PHP_EOL;


//////////  WHAT ARE PHP MAGIC METHODS_ HOW THEY WORK  //////////

// PHP magic methods are special methods that begin with a double underscore _, automatically called by php in specific circumstances, allowing yu to customize the behavior of your objects

// 

// require_once __DIR__ . '/../vendor/autoload.php';

// $invoice = new App\Invoice(15);

// $invoice->amount = 15; // not assignable property exist and protected
// $invoice->amount = 35; // assign value with __set method to protected

// echo $invoice->amount . '<br/>';
// var_dump($invoice);
// var_dump(isset($invoice->amount));
// var_dump($invoice);
// unset($invoice->amount);
// var_dump($invoice);

// App\Invoice::$amount;
// App\Invoice::process(1, 2, 3); // statically error undefined method, but works if define __callStatic method in class 
// $invoice->process(1, 2, 3);
// $invoice->process(15, 'Some Description'); // if process() method protected then __call() magic method will called

// echo $invoice;
// var_dump($invoice instanceof Stringable); // Stringable interface denotes a class as having a __toString() method

// var_dump(is_callable($invoice));
// $invoice(); // call object as func

// var_dump($invoice); // with debuginfo


//////////  WHAT IS LATE STATIC BINDING_HOW IT WORKS IN PHP  //////////

// Late static binding (LSB) is a way to referance the called class in a context of static inheritance, even if the method is defined in a parent class
// When using self:: in a base class, it refers to the class where the method id defined, not the child class that called it. LSB solves this by using static:: instead of self::

// require_once __DIR__ . '/../vendor/autoload.php';

// $classA = new \App\ClassA();
// $classB = new \App\ClassB();

// echo $classA->getName() . '<br/>';
// echo $classB->getName() . '<br/>';

// echo \App\ClassA::getName() . '<br/>';
// echo \App\ClassB::getName() . '<br/>';

// var_dump(\App\ClassA::make()); // return CLassA 
// var_dump(\App\ClassB::make()); // return ClassB


//////////  PHP TRAITS - HOW THEY WORK_DRAWBACKS  //////////

// Traits are a mechanism that allows for code reuse in a more flexible way than traditional ingeritance, with use keyword it simply take the code that written in the trait and paste it in any class at compile time

// require_once __DIR__ . '/../vendor/autoload.php';

// $coffeeMaker = new \App\CoffeeMaker();
// $coffeeMaker->makeCoffee();

// $latteMaker = new \App\latteMaker();
// $latteMaker->makeCoffee();
// $latteMaker->makelatte();

// $CappuccinoMaker = new \App\CappuccinoMaker();
// $CappuccinoMaker->makeCoffee();
// $CappuccinoMaker->makeCappuccino();

// $AllInOneCoffeeMaker = new \App\AllInOneCoffeeMaker();
// $AllInOneCoffeeMaker->makeCoffee();
// $AllInOneCoffeeMaker->makeLatte();
// // $AllInOneCoffeeMaker->makeOriginalLatte();
// $AllInOneCoffeeMaker->makeCappuccino();

// \App\LatteMaker::foo();
// echo \App\LatteMaker::$x;

// \App\CoffeeMaker::$foo = 'foo';
// \App\LatteMaker::$foo = 'foo';
// \App\AllInOneCoffeeMaker::$foo = 'bar';

// echo \App\CoffeeMaker::$foo . ' ' . \App\LatteMaker::$foo; // result bar bar in without static
// echo \App\LatteMaker::$foo . ' ' . \App\AllInOneCoffeeMaker::$foo; // result foo bar with defined properties in trait


//////////  PHP ANONYMOUS CLASSES  //////////

// Anonymous classes are useful when you need a simple one-off object, especially for things like mochking, simple classbacks, or dependency injection, without having to formally define a named class, anonymous classes can also implement interfaces, or extend other classes, and also traits 

// use App\ClassA;
// use App\MyInterface;

// require_once __DIR__ . '/../vendor/autoload.php';

// $obj = new class(1, 2, 3) implements MyInterface {
//   public function __construct(public int $x, public int $y, public int $z) {}
// };

// // var_dump(get_class($obj)); // Returns the name of the class of an object

// foo($obj);

// function foo(MyInterface $obj)
// {
//   var_dump($obj);
// } // with interface it will return name of class

// $obj = new ClassA(1, 2);

// var_dump($obj->bar());


//////////  PHP VARIABLE STORAGE_OBJECT COMPARISON-ZEND VALUE  //////////

// use App\CustomInvoice;
// use App\Invoice;

// require_once __DIR__ . '/../vendor/autoload.php';

// $invoice1 = new Invoice(25, 'My Invoice');
// $invoice2 = new Invoice(25, 'My Invoice');
// $invoice2 = new CustomInvoice(25, 'My Invoice');

// $invoice1 = new Invoice(new \App\Customer('Customer 1'), 25, 'My Invoice');
// $invoice2 = new Invoice(new \App\Customer('Customer 2'), 25, 'My Invoice');

// $invoice1->LinkedInvoice = $invoice2;
// $invoice2->LinkedInvoice = $invoice1;

// $invoice3 = $invoice1; // both points to same memory

// echo 'invoice1 == invoice2' . '<br/>';
// var_dump($invoice1 == $invoice2); // lose comparison
// echo '<br/>';
// echo 'invoice1 === invoice2' . '<br/>';
// var_dump($invoice1 === $invoice2); // strict comparison

// $invoice3->amount = 250; // change also invoice1 
// var_dump($invoice1, $invoice2);


//////////  PHP DOCBLOCK - ADDING COMMENTS TO CLASSES_METHODS  //////////

// A php DocBlock is a special kind of comment that provides metadata about your code typically functions, classes, properties, or files - using the php doc standard, mainly used for documentation, ide support, and static analysis tools like PHPStan or Psalm

// require_once __DIR__ . '/../vendor/autoload.php';

// single line comments

# single line comments 

/*
  * multi-line comment
*/

/**
 * Docblock
 * 
 * @param
 * @return
 */


//////////  PHP - object cloning_clone magic method   //////////

// Object cloning is the process of creating a copy of an object, rather than referencing the original one
// you can define a __clone() method to customize how cloning works

// require_once __DIR__ . '/../vendor/autoload.php';

// $invoice = new \App\Invoice();

// $invoice2 = clone $invoice;

// var_dump($invoice, $invoice2, $invoice === $invoice2);


//////////  PHP SERIALIZE OBJECTS_SERIALIZE MAGIC METHODS  //////////

// Serialized usually refers to data that has been serialized using php serialize() func, serialization is a way to store or pass values (like arrs or objs) as a string, which can later be reconstructed with unserialize()  

// use App\Invoice;

// require_once __DIR__ . '/../vendor/autoload.php';

// $invoice = new Invoice(25, 'Invoice 1', '123456789123456');

// echo serialize(true) . '<br/>';
// echo serialize(1) . '<br/>';
// echo serialize(2.5) . '<br/>';
// echo serialize('hello world') . '<br/>';
// echo serialize([1, 2, 3]) . '<br/>';
// echo serialize(['a' => 1, 'b' => 2]) . '<br/>';
// var_dump(unserialize(serialize(['a' => 1, 'b' => 2])));

// echo serialize($invoice) . '<br/>';
// var_dump(unserialize('O:11:"App\Invoice":1:{s:5:"*id";s:21:"invoice_682c38cf5f70b";}'));

// $str = serialize(false);
// var_dump(unserialize($str));

// $str = serialize($invoice);
// $invoice2 = unserialize($str);

// echo $str . '<br/>';
// var_dump($invoice2);


//////////  OOP ERROR HANDLING IN PHP - EXCEPTIONS_TRY CATCH FINALLY BLOCKS  //////////

// in oop error handling is a crucial aspect of writing robust and reliable code
// Exception are events that occur during the execution of a program that disrupt the normal flow of instructions
// try-catch blocks are used to catch and handle exceptions 

// use App\Customer;
// use App\Invoice;

// require_once __DIR__ . '/../vendor/autoload.php';

// function foo()
// {
//   echo 'foo' . '<br/>';

//   return false;
// }

// var_dump(process());

// function process()
// {
//   $invoice = new Invoice(new Customer(['foo' => 'bar']));

//   try {
//     $invoice->process(-25);

//     return true;
//   } catch (\Exception $e) {
//     $e->getMessage() . '<br/>';

//     return foo();
//   } finally {
//     echo 'Finally block' . '<br/>';

//     return -1;
//   }
// }

// try {
//   $invoice->process(25);
// } catch (\App\Exception\MissingBillingInfoException | \InvalidArgumentException $e) {
//   echo $e->getMessage() . '<br/>';
// }

// set_exception_handler(function (\Throwable $e) {
//   var_dump($e->getMessage());
// });

// echo array_rand([], 1);

// $invoice = new Invoice(new Customer());

// $invoice->process(-25);


//////////  PHP - DATETIME OBJECTS  //////////

// Php provides a robust set of classes for working with dates and times, including the DateTime class

require_once __DIR__ . '/../vendor/autoload.php';

// $date = '15/05/2025 3:30PM';
// $date = '15/05/2025';

// $dateTime = new DateTime(str_replace('/', '-', $date)); use creatFromFormat instead of str_replace
// $dateTime = DateTime::createFromFormat('d/m/Y', $date)->setTime(0, 0); // if i remove time from $date it will use current time in $dateTime

// day/month/year - europe
// month/day/year - U.S

// echo $dateTime->getTimezone()->getName() . ' - ' .  $dateTime->format('m/d/y g:i A') . '<br/>';
// $dateTime->setTimezone(new DateTimeZone('Europe/Amsterdam'))->setDate(2021, 4, 21)->setTime(2, 15);
// echo $dateTime->getTimezone()->getName() . ' - ' .  $dateTime->format('m/d/y g:i A') . '<br/>';

// var_dump($dateTime, new DateTime('15-05-2025'));

// $dateTime1 = new DateTime('05/25/2021 9:15 AM');
// $dateTime2 = new DateTime('03/15/2021 3:25 AM');

// $dateTime = new DateTime('05/25/2021 9:15 AM');
// $interval = new DateInterval('P3M2D');

// var_dump($dateTime1 < $dateTime2);
// var_dump($dateTime1 > $dateTime2);
// var_dump($dateTime1 == $dateTime2);
// var_dump($dateTime1 <=> $dateTime2);

// echo $dateTime2->diff($dateTime1)->days;
// echo $dateTime2->diff($dateTime1)->format('%Y years, %m months, %d days, %H, %i, %s, %a');
// echo $dateTime2->diff($dateTime1)->format('%R%a'); // positive number
// echo $dateTime1->diff($dateTime2)->format('%R%a'); // negative number

// $interval->invert = 1;

// $dateTime->add($interval);
// echo $dateTime->format('m/d/Y g:iA') . '<br/>';

// $dateTime->sub($interval);
// echo $dateTime->format('m/d/Y g:iA');

// $from = new DateTime();
// $from = new DateTimeImmutable(); // use this then no need for clone

// $to = $from->add(new DateInterval('P1M')); // not work both ill change, but works with DateTimeImmutable
// $to = (clone $from)->add(new DateInterval('P1M'));
// $to = $to->add(new DateInterval('P1Y'));

// echo $from->format('m/d/Y') . ' - ' . $to->format('m/d/Y');

// $period = new DatePeriod(new DateTime('05-01-2021'), new DateInterval('P3D'), new DateTime('05/31/2021'));

// foreach ($period as $date) {
//   echo $date->format('m/d/Y') . '<br/>';
// }


//////////  PHP ITERATORS_ITERABLE TYPES - ITERATE OVER OBJECTS   //////////

// Php provides several iterator and iterable types that allow you to traverse and manipulate data structures such as arrays and ojects

// use App\InvoiceCollection;

// require_once __DIR__ . '/../vendor/autoload.php';

// foreach (new App\Invoice(25) as $key => $value) {
//   echo $key . ' = ' . $value . '<br/>';
// }

// $invoiceCollection = new InvoiceCollection([new \App\Invoice(15), new \App\Invoice(25), new \App\Invoice(50)]);

// foreach ($invoiceCollection as $invoice) {
//   echo $invoice->id . ' - ' . $invoice->amount . '<br/>';
// }

// foo($invoiceCollection);
// foo([1, 2, 3]);

// function foo(iterable $iterable)
// {
//   foreach ($iterable as $i => $item) {
//     echo $i . '<br/>';
//   }
// }


//////////  PHP SUPERGLOBALS - BASIC ROUTING USING THE SERVER INFO  //////////

// For more videos i will use this down code so i don't need title

// Php superglobals are built-in variables that are always accessible, regardless of scope - meaning you can use them in func, classes, or files here are most commonly used superglobals:
// $_GET # contains data sent via URL parameters (query string)
// $_POST # contains data send via HTTP POST method, used for form submit
// $_REQUEST # contains data from $_GET, $_POST, and $_COOKIE
// $_SERVER # contains server and execution environment information
// $_COOKIE # stores cookie values sent by the browser
// $_FILES # handles file uploads
// $_ENV # contains environment variables
// $GLOBALS # accesses global variables from anywhere in the sript

// Routing refers to directing incoming HTTP requests (like example.com/home) to the correct code that handles the request, ofter in an MVC (Model-View-Controller) structure

// A session is a way to store data across multiple requests in php, When a user visits a website a unique session ID is generated and stored in a cookie on the user's browser, the session data is stored on the server-side
// A cookie is a small text file stored on the user's browser, When a user visit a website the website cn set a cookie on the user's browser, the cookie is send with every request to the website
// Output buffering is a technique used to store output in a buffer before sending it to the browser, When output buffering is enabled, php stores the output in a buffer instead of sending it directly to the browser

// Php provides a way to handle file uploads through the $_FILES superglobal array

// The php MVC (Model-View-Controller) pattern is a software architectural pattern that separates your application logic into three interconnected components
// Model: Business logic and data manipulation, fetching data from the database, saving user inputs etc
// View: presentation (HTML/CSS output), displaying data to the user
// Controller: Handling user input and updating Model & View accordingly, receiving a request and deciding what to do 

require_once __DIR__ . '/../vendor/autoload.php';

use App\View;

session_start(); // Initialize session data

define('STORAGE_PATH', __DIR__ . '/../storage');
define('VIEW_PATH', __DIR__ . '/../views');

try {
  $router = new App\Router();

  $router
    ->get('/', [App\Controllers\HomeController::class, 'index'])->get('/download', [App\Controllers\HomeController::class, 'download'])->get('/upload', [App\Controllers\HomeController::class, 'upload'])->get('/invoices', [App\Controllers\InvoiceController::class, 'index'])->get('/invoices/create', [App\Controllers\InvoiceController::class, 'create'])->post('/invoices/create', [App\Controllers\InvoiceController::class, 'store']);

  echo $router->resolve($_SERVER['REQUEST_URI'], strtolower($_SERVER['REQUEST_METHOD']));
} catch (\App\Exception\RouteNotFoundException $e) {
  // header('HTTP/1.1 404 Not Found'); // Send a raw HTTP header
  http_response_code(404);

  echo View::make('error/404');
}

// phpinfo();
// var_dump($_SESSION);
// var_dump($_COOKIE);
