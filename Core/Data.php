<?php

namespace Pmvc\Core;

use \Pmvc\Core\Format;
use \Pmvc\Core\Validate;

class Data {

    /** 
    * Count the numbers of keys in a given array or object. 
    * @param array || object 
    * @return int numbers of keys
    */ 
    public static function count($data = false) {

        if ($data && Validate::isArray($data)) {

            return count($data);
        } else if ($data && Validate::isObject($data)) {

            return count(get_object_vars($data));
        }

        return 0;
    }

    /** 
    * Alias for var_dump. 
    * @param mixed
    * @return boolean
    */ 
    public static function dump($data = false) {

        if (isset($data)) {

            echo var_dump($data);
            return true;
        }

        return false;
    }

    /** 
    * Retrieve value(s) from GET request. 
    * @param string key 
    * @return array || string
    */ 
    public static function get($key = false) {

        if (isset($_GET)) {

            if ($key) {

                return $_GET[$key];
            }

            return $_GET;
        }

        return false;
    }

    /** 
    * Get all keys from a given array or object. 
    * @param array || object
    * @return array
    */ 
    public static function keys($data = false) {

        if ($data && Validate::isArray($data)) {

            return array_keys($data);
        } else if ($data && Validate::isObject($data)) {

            return get_object_vars($data);
        }

        return false;
    }

    /** 
    * Retrieve value(s) from POST request. 
    * @param string key 
    * @return array || string
    */ 
    public static function post($key = false) {

        if (isset($_POST)) {

            if ($key) {

                return $_POST[$key];
            }

            return $_POST;
        }

        return false;
    }

    /** 
    * Pre print value(s) from a given variable.  
    * @param array || double || integer || json || object || string
    */ 
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

    /** 
    * Return a random value from a given array or object. 
    * @param array || object
    * @return string random value
    */ 
    public static function random($data = false) {

        if($data) {

            if(Validate::isObject($data)) {

                $data = Format::objectToArray($data);
            }

            if(Validate::isArray($data)) {

                return $data[array_rand($data, 1)];
            } 
        }

        return false;
    }
    
    /** 
    * Retrieve value(s) from REQUEST. 
    * @param string key 
    * @return array || string
    */ 
    public static function request($key = false) {

        if (isset($_REQUEST)) {

            if ($key) {

                return $_REQUEST[$key];
            }

            return $_REQUEST;
        }

        return false;
    }

    /** 
    * Retrieve value(s) from SESSION.  
    * @param string key 
    * @return array || string
    */ 
    public static function session($key = false) {

        if (isset($_SESSION)) {

            if ($key) {

                return $_SESSION[$key];
            }

            return $_SESSION;
        }

        return false;
    }

    /** 
    * Return type of a given variable. 
    * @param array || double || integer || json || object || string
    * @return string type of variable
    */ 
    public static function type($data = false) {

        if ($data) {

            $dataType = gettype($data);

            if ($dataType === 'string') {

                if (Validate::isJson($data)) {
                    $dataType = 'json';
                }
            }

            return $dataType;
        }

        return false;
    }

}
