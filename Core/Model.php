<?php

namespace Pmvc\Core;

use \Pmvc\Core\Config;
use \Pmvc\Core\File;

class Model {

    public static function load($model = false) {

        $path = DOC_ROOT . Config::get('paths', 'modules');

        if ($model && File::isFile($path . $model . '.php')) {

            $array = explode('/', $model);
            $modelName = end($array);
          
            require $path . $model . '.php';

            return new $modelName();
        }

        return false;
    }

}
