<?php


namespace ElgatoApi;


class Config {

    private $_config;

    public function __construct() {

        $jsonString = file_get_contents(__DIR__.DIRECTORY_SEPARATOR.'config.json');
        $this->_config = json_decode($jsonString, true);

    }

    /**
     * @return KeylightConfig[]
     */
    public function GetKeylights() {
        $ary = array();
        $keylights = $this->_config['keylights'];
        foreach ($keylights as $keylight) {
            $kl = new KeylightConfig();
            $kl->name = $keylight['name'];
            $kl->ip = $keylight['ip'];
            $ary[] = $kl;
        }
        return $ary;
    }

}

class KeylightConfig {

    public $name;
    public $ip;

}
