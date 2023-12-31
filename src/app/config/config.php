<?php

// Database connection
define('BASE_URL', 'http://localhost:8008/public');
define('STORAGE_URL', 'http://localhost:8008/storage');
define('REST_URL', 'http://cooklyst-rest-api:3000');
define('DB_HOST', $_ENV['MYSQL_HOST']);
define('DB_NAME', $_ENV['MYSQL_DATABASE']);
define('DB_USER', $_ENV['MYSQL_USER'] ?? 'root');
define('DB_PASSWORD', $_ENV['MYSQL_PASSWORD'] ?? $_ENV['MYSQL_ROOT_PASSWORD']);
define('DB_PORT', $_ENV['MYSQL_PORT']);
define('PAGE_ROWS', (int) $_ENV['PAGE_ROWS'] ?? 20);

// Session
define('SESSION_EXPIRATION_TIME', 24 * 60 * 60); // 24 hours

// Debounce
define('DEBOUNCE_TIMEOUT', 400);    // 400 ms

// Storage
define('VIDEO_FORMAT', [
    'video/mp4' => '.mp4'
]);

define('IMAGE_FORMAT', [
    'image/png' => '.png',
    'image/jpeg' => '.jpeg'
]);

define('MAX_UPLOAD_SIZE', 40 * 1024 * 1024);

// key
define('REST_KEY', 'php');
