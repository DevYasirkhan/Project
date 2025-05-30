<?php

//////////  PHP ITERATORS_ITERABLE TYPES - ITERATE OVER OBJECTS   //////////

namespace App;

class Collection implements \IteratorAggregate
{

  public function __construct(private array $items) {}

  public function getIterator()
  {
    return new \ArrayIterator($this->items); // This iterator allows to unset and modify values and keys while iterating over Arrays and Objects.
  }
}
