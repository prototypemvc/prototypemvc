<?php

namespace \pmvc\core;

use \pmvc\core\validate;

class data {

    public static function count($data = false) {

        if ($data && validate::isArray($data)) {

            return count($data);
        } else if ($data && validate::isObject($data)) {

            return count(get_object_vars($data));
        }

        return 0;
    }

    public static function dump($data = false) {

        if (isset($data)) {

            echo var_dump($data);
            return true;
        }

        return false;
    }

    public static function get($key = false) {

        if (isset($_GET)) {

            if ($key) {

                return $_GET[$key];
            }

            return $_GET;
        }

        return false;
    }

    public static function keys($data = false) {

        if ($data && validate::isArray($data)) {

            return array_keys($data);
        } else if ($data && validate::isObject($data)) {

            return get_object_vars($data);
        }

        return false;
    }

    public static function post($key = false) {

        if (isset($_POST)) {

            if ($key) {

                return $_POST[$key];
            }

            return $_POST;
        }

        return false;
    }

    public static function pre($data = false) {

        if ($data) {

            $type = self::type($data);

            $functions = array(
                'array' => 'print_r',
                'double' => 'echo',
                'integer' => 'echo',
                'json' => 'json_encode',
                'string' => 'echo',
            );

            echo '<pre>';
            if (array_key_exists($type, $functions)) {

                if ($functions[$type] === 'echo') {

                    echo $data;
                } else if ($functions[$type] === 'json_encode') {

                    $json = json_decode($data);
                    echo json_encode($json, JSON_PRETTY_PRINT);
                } else {

                    $functions[$type]($data);
                }
            } else {

                var_dump($data);
            }
            echo '</pre>';
        }
    }

    public static function session($key = false) {

        if (isset($_SESSION)) {

            if ($key) {

                return $_SESSION[$key];
            }

            return $_SESSION;
        }

        return false;
    }

    public static function type($data = false) {

        if ($data) {

            $dataType = gettype($data);

            if ($dataType === 'string') {

                if (validate::isJson($data)) {
                    $dataType = 'json';
                }
            }

            return $dataType;
        }

        return false;
    }

}
