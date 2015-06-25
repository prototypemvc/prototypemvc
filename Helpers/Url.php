<?php

namespace Pmvc\Helpers;

use \Pmvc\Helpers\Session;

class Url {

    public static function redirect($url = null) {
        header('location: ' . BASE_URL . '/' . $url);
        exit;
    }

}
