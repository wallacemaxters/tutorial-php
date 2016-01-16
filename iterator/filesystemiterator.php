<?php

$files = new FileSystemIterator(__DIR__, FilesystemIterator::CURRENT_AS_SELF);

foreach ($files as $key => $file)
{
	if ($files->isDir()) continue;

	echo $key, ' => ', $files->isExecutable() ? 'sim' : 'não', "\n";
}