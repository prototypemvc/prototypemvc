<?php

namespace Pmvc\Core;

use \Pmvc\Core\View;
use \Pmvc\Core\File;
use \Pmvc\Core\Model;

class Load {

    public static function css($file = false) {

        return View::css($file);
    }

    public static function file($file = false) {

        return File::get($file);
    }

    public static function js($file = false) {

        return View::js($file);
    }

    public static function model($file = false) {

        return Model::load($file);
    }

    public static function view($file = false) {

        return View::load($file);
    }

}
