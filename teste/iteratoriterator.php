<?php


class CallbackIterator extends IteratorIterator
{
	protected $callback;

	public function __construct(Iterator $iterator, callable $callback)
	{
		parent::__construct($iterator);

		$this->callback = $callback;
	}

	public function current()
	{
		return call_user_func($this->callback, parent::current());
	}
}


$array = new ArrayIterator(
	[1, 2, 3, 4, 5]
);

$it = new CallbackIterator($array, function ($value)
{
	return 	$value * 3;
});

$it2 = new CallbackIterator($array, function ($value)
{
	return 	$value * $value;
});

foreach ($it as $value)
{
	echo $value, PHP_EOL;
}

foreach ($it2 as $value)
{
	echo $value, PHP_EOL;

}


