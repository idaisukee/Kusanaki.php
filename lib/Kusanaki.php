<?php

namespace Kusanaki;

	if (file_exists(__DIR__ . '/../vendor/autoload.php')) {
		require __DIR__ . '/../vendor/autoload.php';
	} else {
		require __DIR__ . '/../../../autoload.php';
	}

	use Sinsituwoka\Sinsituwoka;
	use GuzzleHttp\Client;

	class Kusanaki
	{


		public function __construct()
		{
			$s = new Sinsituwoka();
			$this->bearer = $s->bearer();
			$this->client = new Client([
				'base_uri' => 'https://www.googleapis.com/drive/v3/',
				'timeout'  => 2.0,
			]);
			$this->upload_client = new Client([
				'base_uri' => 'https://www.googleapis.com/upload/drive/v3/',
				'timeout'  => 2.0,
			]);
		}
		
		public function search($q)
		{
			$response = $this->client->request('GET', 'files', [
				'query' => [
					'q' => 'name contains \''.$q.'\'',
				],
					'headers' => [
						'Authorization' => 'Bearer '.$this->bearer,
					],
			]);
			echo $response->getBody();
		}

		public function multi($filename, $parent = null, $content_type)
		{

			$basename = basename($filename);

			$metadata_arr = [
				'name' => $basename,
				'parents' => [ $parent ],
			];

			$metadata = json_encode($metadata_arr);

			$body = fopen($filename, 'r');

			$response = $this->upload_client->request('POST', 'files', [
				'query' => [
					'uploadType' => 'multipart'
				],
				'headers' => [
					'Authorization' => 'Bearer '.$this->bearer,
				],
				'multipart' => [
					[
						'name' => 'metadata',
						'contents' => $metadata,
						'headers' => [
							'Content-Type' => 'application/json; charset=UTF-8',
						],
					],
					[
						'name' => 'body',
						'contents' => $body,
						'headers' => [
							'Content-Type' => $content_type,
						],
					],
				],
			]);
		}
	}



