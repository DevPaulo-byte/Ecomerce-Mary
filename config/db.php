<?php

include_once 'config.php';

$db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_SCHEMA, DB_PORT);

if ($db->connect_error) {
    echo("Connection failed: {$db->connect_error}");
    exit();
}

$db->set_charset(DB_CHARSET);
