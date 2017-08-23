<?php

	if (file_exists(__DIR__ . '/../vendor/autoload.php')) {
		require __DIR__ . '/../vendor/autoload.php';
	} else {
		require __DIR__ . '/../../../autoload.php';
	}

	use Sinsituwoka\Sinsituwoka;
	use Kusanaki\Kusanaki;
	use GuzzleHttp\Client;

	$q = $argv[1];
	$k = new Kusanaki();
	$k->search($q);
