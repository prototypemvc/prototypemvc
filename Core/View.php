<?php

namespace Pmvc\Core;

use \Pmvc\Core\Text;
use \Pmvc\Core\Config;
use \Pmvc\Core\File;
use \Pmvc\Core\Format;

class view {

    public static function css($file = false) {

        if ($file && !Text::contains($file, '.css')) {
            $file .= '.css';
        }

        $path = DOC_ROOT . Config::get('paths', 'css');

        if ($file && File::isFile($path . $file)) {

            echo '<style>';
            require $path . $file;
            echo '</style>';
            return true;
        }

        return false;
    }

    public static function load($file = false, $data = false) {

        if ($file && !Text::contains($file, '.php')) {
            $file .= '.php';
        }

        $path = DOC_ROOT . Config::get('paths', 'modules');

        if ($file && File::isFile($path . $file)) {

            require $path . $file;
            return true;
        }

        return false;
    }

    public static function js($file = false) {

        if ($file && !Text::contains($file, '.js')) {
            $file .= '.js';
        }

        $path = DOC_ROOT . Config::get('paths', 'js');

        if ($file && File::isFile($path . $file)) {

            echo '<script>';
            require $path . $file;
            echo '</script>';
            return true;
        }

        return false;
    }

    public static function json($input = false, $exit = true) {

        if ($input) {

            echo Format::toJson($input);
            if ($exit) {

                exit();
            }
        }

        return false;
    }

}
