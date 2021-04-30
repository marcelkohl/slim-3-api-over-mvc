<?php
//Cross-Origin Resource Sharing
$app->add(new Tuupola\Middleware\CorsMiddleware([
    "origin" => ["*"],
    "methods" => ["GET", "POST", "PUT", "PATCH", "DELETE", "OPTIONS"],
    "headers.allow" => ["accept", "Content-Type"],
    "credentials" => false,
]));
