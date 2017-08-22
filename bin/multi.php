<?php

	if (file_exists('../vendor/autoload.php')) {
		require '../vendor/autoload.php';
	} else {
		require '../../../autoload.php';
	}

	use Sinsituwoka\Sinsituwoka;
	use Kusanaki\Kusanaki;
	use GuzzleHttp\Client;

	$filename='/tmp/hh';
	$content_type = 'text/json';
	$k = new Kusanaki();
	$k->multi($filename, null, $content_type);

