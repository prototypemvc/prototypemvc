<?php

namespace Pmvc\Core;

use \Pmvc\Core\View;
use \Pmvc\Core\File;
use \Pmvc\Core\Model;

class Load {

    /**
    * Load a given CSS file. 
    * @param string path to file  
    * @return boolean 
    */
    public static function css($file = false) {

        return View::css($file);
    }

    /**
    * Get file content. 
    * @param string path to file  
    * @return boolean 
    */
    public static function file($file = false) {

        return File::get($file);
    }

    /**
    * Load a given JavaScript file. 
    * @param string path to file  
    * @return boolean 
    */
    public static function js($file = false) {

        return View::js($file);
    }

    /**
    * Load a given model. 
    * @param string path to file  
    * @example model('blog/model/blog') 
    * @example model('blog/model/blog.php') 
    * @return boolean 
    */
    public static function model($file = false) {

        return Model::load($file);
    }

    /**
    * Load a given view. 
    * @param string path to file  
    * @example model('blog/view/index') 
    * @example model('blog/view/index.php') 
    * @return boolean 
    */
    public static function view($file = false) {

        return View::load($file);
    }

}
