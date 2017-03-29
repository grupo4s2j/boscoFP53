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

	'CONSUMER_KEY'        => '3epC3qxye1g9DYJ5hKFYo4o5C',
	'CONSUMER_SECRET'     => 'rW6q7AcuUTfzTaIUFPH3M2i7bsrvJxtKhbRfgTMSi4QRcCdEyY',
	'ACCESS_TOKEN'        => '845301470249582596-CXJQs0jTLABBdfkwFt8vN1evmmKpD6A',
	'ACCESS_TOKEN_SECRET' => 'Fs05B82Y6FnOc45YwaPApgVZA6yDAaGjcqTYB51FanVTL',
];
