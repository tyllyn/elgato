<?php

// TODO: Build out this router

namespace ElgatoApi;

function qs($key) {
    if (!isset($_GET[$key])) {
        return null;
    }
    return ($_GET[$key]);
}

function do404() {
    header("HTTP/1.0 404 Not Found");
    exit();
}

$device = qs('device');
$method = qs('method');
$args = qs('args');

if (empty($device) || empty($method)) {
    do404();
}

$ds = DIRECTORY_SEPARATOR;
$file = __DIR__ . $ds . $device . $ds . $method . '.php';

if (!file_Exists($file)) {
    do404();
}

include_once($file);