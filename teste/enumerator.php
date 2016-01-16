<?php

class Enumerator extends IteratorIterator
{
	protected $start = 0;

	protected $key;

	public function __construct(Iterator $iterator, $start = 0)
	{
		parent::__construct($iterator);

		$this->start = $start;

		$this->key = $this->start;
	}

	public function key()
	{
		return $this->key;
	}

	public function rewind()
	{
		parent::rewind();

		$this->key = $this->start;
	}

	public function next()
	{
		++$this->key;

		parent::next();
	}
}


$array = new ArrayIterator([
	'wallace', 'wayne', 'sidney', 'gustavo', 'miguel'
]);


foreach (new Enumerator($array, 1) as $key => $value)
{
	
}

