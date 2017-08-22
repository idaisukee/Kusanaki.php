<?php

	if (file_exists('../vendor/autoload.php')) {
		require '../vendor/autoload.php';
	} else {
		require '../../../autoload.php';
	}

	use Sinsituwoka\Sinsituwoka;
	use Kusanaki\Kusanaki;
	use GuzzleHttp\Client;

	$k = new Kusanaki();
	$k->search('消化器');
