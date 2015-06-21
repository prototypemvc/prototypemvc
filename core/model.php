<?php

namespace \pmvc\core;

use \pmvc\core\config;
use \pmvc\core\file;

class model {

    public static function load($model = false) {

        $path = DOC_ROOT . config::get('paths', 'modules');

        if ($model && file::isFile($path . $model . '.php')) {

            $modelName = end(explode('/', $model));

            require $path . $model . '.php';

            return new $modelName();
        }

        return false;
    }

}
