<?php

//////////  PHP ITERATORS_ITERABLE TYPES - ITERATE OVER OBJECTS   //////////

namespace App;

// class InvoiceCollection implements \Iterator // instead of this use \IteratorAggregate and replace all code with getIterator() in Collection.php
class InvoiceCollection extends Collection
{
  // private int $key;

  // public function __construct(public array $invoices) {}

  // public function current(): mixed
  // {
  //   echo __METHOD__ . '<br/>'; // returns the class name
  //   // return current($this->invoices); // Return the current element in an array
  //   return $this->invoices[$this->key];
  // }

  // public function next(): void
  // {
  //   echo __METHOD__ . '<br/>';
  //   // next($this->invoices); // Advance the internal array pointer of an array
  //   ++$this->key;
  // }

  // public function key(): mixed
  // {
  //   echo __METHOD__ . '<br/>';
  //   // return key($this->invoices); // Fetch a key from an array
  //   return $this->key;
  // }

  // public function valid(): bool // Checks if current position is valid
  // {
  //   echo __METHOD__ . '<br/>';
  //   // return current($this->invoices) !== false;
  //   return isset($this->invoices[$this->key]);
  // }

  // public function rewind(): void // Rewind the Iterator to the first element
  // {
  //   echo __METHOD__ . '<br/>';
  //   // reset($this->invoices); // Set the internal pointer of an array to its first element
  //   $this->key = 0;
  // }
}
