<?php

// You can find the keys here : https://apps.twitter.com/

return [
	'debug'               => function_exists('env') ? env('APP_DEBUG', false) : false,

	'API_URL'             => 'api.twitter.com',
	'UPLOAD_URL'          => 'upload.twitter.com',
	'API_VERSION'         => '1.1',
	'AUTHENTICATE_URL'    => 'https://api.twitter.com/oauth/authenticate',
	'AUTHORIZE_URL'       => 'https://api.twitter.com/oauth/authorize',
	'ACCESS_TOKEN_URL'    => 'https://api.twitter.com/oauth/access_token',
	'REQUEST_TOKEN_URL'   => 'https://api.twitter.com/oauth/request_token',
	'USE_SSL'             => true,

	'CONSUMER_KEY'        => 'lvxRcYIDeISdtCwuFdoAirORm',
	'CONSUMER_SECRET'     => 'qnb5HnB3XwU6cjaf6Qp4LyGMlehFWcLWLPSiiyC6Q3ICwQnbT6',
	'ACCESS_TOKEN'        => '839873928227008513-Vcr9BxYBX1HvVParGmY5come6azN30W',
	'ACCESS_TOKEN_SECRET' => 'JaFpKNSFnCAr2u00F7yp7hV4dhgDiES9ZLBVZ6dzeEbOT',
];
