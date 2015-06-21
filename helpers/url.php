<?php

namespace \pmvc\helpers;

use \pmvc\Helpers\Session;

class Url {

    public static function redirect($url = null) {
        header('location: ' . DIR . $url);
        exit;
    }

    public static function get_template_path() {
        return DIR . 'templates/' . Session::get('template') . '/';
    }

}
