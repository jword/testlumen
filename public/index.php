<?php
define('APP_MODE', 'Http');
define('APP_TIME', microtime(true));
$app = require __DIR__ . '/../bootstrap/app.php';

$app->run();
