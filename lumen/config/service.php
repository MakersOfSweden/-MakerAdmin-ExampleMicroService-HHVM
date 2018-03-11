<?php

return [
	'name'    => 'Example microservice',
	'version' => '1.0',
	'url'     => 'yourmodule',
	'gateway' => getenv('APIGATEWAY'),
	'bearer'  => getenv('BEARER'),
];
