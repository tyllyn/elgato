<?php

use ElgatoApi\Config;

require_once(__DIR__.'/../Config.php');

$config = new Config();
$keylights = $config->GetKeylights();

foreach ($keylights as $key => $keylight) {

    $url = 'http://'.$keylight->ip.':9123/elgato/lights';
    $status = file_get_contents($url);
    $json = json_decode($status, true);
    $keylights[$key]['status'] = $json;

}

die(var_export($keylights,true));