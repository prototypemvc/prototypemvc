<?php

namespace \pmvc\core;

use \pmvc\core\text;
use \pmvc\core\config;
use \pmvc\core\file;
use \pmvc\core\format;

class view {

    public static function css($file = false) {

        if ($file && !text::contains($file, '.css')) {
            $file .= '.css';
        }

        $path = DOC_ROOT . config::get('paths', 'css');

        if ($file && file::isFile($path . $file)) {

            echo '<style>';
            require $path . $file;
            echo '</style>';
            return true;
        }

        return false;
    }

    public static function load($file = false, $data = false) {

        if ($file && !text::contains($file, '.php')) {
            $file .= '.php';
        }

        $path = DOC_ROOT . config::get('paths', 'modules');

        if ($file && file::isFile($path . $file)) {

            require $path . $file;
            return true;
        }

        return false;
    }

    public static function js($file = false) {

        if ($file && !text::contains($file, '.js')) {
            $file .= '.js';
        }

        $path = DOC_ROOT . config::get('paths', 'js');

        if ($file && file::isFile($path . $file)) {

            echo '<script>';
            require $path . $file;
            echo '</script>';
            return true;
        }

        return false;
    }

    public static function json($input = false, $exit = true) {

        if ($input) {

            echo format::toJson($input);
            if ($exit) {

                exit();
            }
        }

        return false;
    }

}
