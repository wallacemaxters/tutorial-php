<!DOCTYPE html>
<html>
<head>
	<title>Aulas do Wallace Maxters</title>
</head>
<body>
	<h1>Aulas do Wallace Maxters  - Iterator</h1>
	<code>
	<?php

	$files = new FilesystemIterator(__DIR__, FilesystemIterator::CURRENT_AS_SELF);

	foreach ($files as $fullpath => $value) {

		if ($fullpath === __FILE__ || $files->isDir()) continue;

		echo "<a href={$value}>{$files->getBasename()}</a><br/>";
	}
	?>
	</code>
</body>
</html>