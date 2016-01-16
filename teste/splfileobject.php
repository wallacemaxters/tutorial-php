<?php

$file = new SplFileObject(__DIR__ . '/iterator.php', 'r');

foreach ($file as $key => $line)
{
	//var_dump($key, $line);
}


$file->seek(PHP_INT_MAX);

$last_line = $file->key();

// for ($file->seek($last_line - 10); $file->valid(); $file->next()) 
// {
// 	echo $file->current(), "\n";
// }

$it = new LimitIterator($file, $last_line - 10, $last_line);

foreach ($it as $key => $v)
{
	echo $key, '=>', $v, "\n";
}
