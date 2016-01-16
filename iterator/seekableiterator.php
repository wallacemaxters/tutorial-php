<?php

class MySeekableIterator implements SeekableIterator {

    private $position;

    private $array;

    /* Method required for SeekableIterator interface */

    public function __construct(array $array)
    {
    	$this->array = array_values($array);

    	$this->position = 0;
    }

    public function seek($position) {

      if (!isset($this->array[$position])) {
          throw new OutOfBoundsException("invalid seek position ($position)");
      }

      $this->position = $position;
    }

    /* Methods required for Iterator interface */
    
    public function rewind() {
        $this->position = 0;
    }

    public function current() {
        return $this->array[$this->position];
    }

    public function key() {
        return $this->position;
    }

    public function next() {
        ++$this->position;
    }

    public function valid() {
        return isset($this->array[$this->position]);
    }
}



try {

    $it = new MySeekableIterator([
    	'zero',
    	'um',
    	'dois',
    	'três',
    	'quatro',
    	'cinco'
    ]);

    echo $it->current(), "\n";
    
    $it->seek(2);
    echo $it->current(), "\n";
    
    $it->seek(1);
    echo $it->current(), "\n";
    
    $it->seek(5);
    echo $it->current();
    
} catch (OutOfBoundsException $e) {
    echo $e->getMessage();
}