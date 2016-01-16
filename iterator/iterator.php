<?php

class Range implements Iterator
{
    public function __construct($min, $max)
    {
        $this->min = $min;
        $this->max = $max;
        $this->current = $this->min;
        $this->key = 0;
    }

    public function next()
    {
        ++$this->current;
        ++$this->key;
    }

    public function key()
    {
        return $this->key;
    }

    public function current()
    {
        return $this->current;
    }

    public function rewind()
    {
        $this->key = 0;
        $this->current = $this->min;
    }

    public function valid()
    {
        return $this->current <= $this->max;
    }
}


// foreach (new Range(50, 100) as $key => $value)
// {
//     echo  $key, '=>', $value, "\n";
// }

$range = new Range(1, 10);

