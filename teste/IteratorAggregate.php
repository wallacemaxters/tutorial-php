<?php

class Collection implements IteratorAggregate
{
	protected $items = [];

	public function __construct(array $items)
	{
		$this->items = $items;
	}

	public function add($item)
	{
		$this->items[] = $item;
	}

	public function remove($key)
	{
		unset($this->items[$key]);
	}

	public function merge(array $items)
	{
		$this->items = array_merge($this->items, $items);
	}

	public function all()
	{
		return $this->items;
	}

	public function getIterator()
	{
		return new ArrayIterator($this->items);
	}


}


$collection = new Collection(['wallace', 'wayne']);

print_r($collection);


foreach ($collection as $key => $value) {r
	var_dump($key, $value);
}

