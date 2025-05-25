<?php

session_start();

ini_set('display_errors', 1);
error_reporting(1);

header('Content-Type: text/html; charset=utf-8');

// Configurações
define("TITLE", "Mary Cosméticos");
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "paulo29");
define("DB_SCHEMA", "ecomerce");
define("DB_PORT", "3306");
define("DB_CHARSET", "utf8mb4");
