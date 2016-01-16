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

$arr = new ArrayIterator([
	'a', 'b', 2, 3, 4, 5, 'v', 'e', 'u', 5, 6
]);


$it = new CallbackFilterIterator($arr, function ()
{
	
});


foreach ($it as $key => $value)
{
	printf("%s => %s\n", $key, $value);
}