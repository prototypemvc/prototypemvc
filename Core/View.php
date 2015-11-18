<?php

namespace Prototypemvc\Core;

use \Prototypemvc\Core\Config;
use \Prototypemvc\Blocks\File;
use \Prototypemvc\Blocks\Format;
use \Prototypemvc\Blocks\Text;

class view {

    /**
    * Load a given CSS file. 
    * @param string path to file  
    * @return boolean 
    */
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

    /** 
    * Force a file download by setting headers.  
    * @param string path to file 
    * @param string extension 
    * @param string file name on client side  
    * @example download('folder/error_log.pdf') 
    * @example download('folder/error_log.pdf', 'pdf' ,'log.pdf')  
    * @return boolean
    */ 
    public static function download($path = false, $extension = false, $name = false) {

        File::download($path, $extension, $name);
    }

    /**
    * Load a given view. 
    * @param string path to file  
    * @example load('blog/view/index') 
    * @example load('blog/view/index.php') 
    * @return boolean 
    */
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

    /**
    * Load a given JavaScript file. 
    * @param string path to file  
    * @return boolean 
    */
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

    /**
    * Echo JSON and exit. 
    * @param mixed input
    * @param boolean exit after displaying JSON? 
    * @return boolean 
    */
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
