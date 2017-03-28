<?php

require_once __DIR__ . "/../vendor/autoload.php";

ToroHook::add("404", function(){
	echo "404";
	http_response_code(404);
});

Toro::serve([
	'/' => Blog\Controllers\HomeController::class,
	'/harsh'=> Blog\Controllers\PostController::class,
	'/post' => Blog\Controllers\PostController::class,
	'post/all' => Blog\Controllers\PostController::class,
	'/post/:number' => Blog\Controllers\PostController::class,

	]);
?>
