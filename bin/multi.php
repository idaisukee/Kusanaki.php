<?php

	if (file_exists(__DIR__ . '/../vendor/autoload.php')) {
		require __DIR__ . '/../vendor/autoload.php';
	} else {
		require __DIR__ . '/../../../autoload.php';
	}

	use Sinsituwoka\Sinsituwoka;
	use Kusanaki\Kusanaki;
	use GuzzleHttp\Client;

	$filename = $argv[1];
	$parent = $argv[2];
	$content_type = $argv[3];
	
	$k = new Kusanaki();
	$k->multi($filename, $parent, $content_type);

