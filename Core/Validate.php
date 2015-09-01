<?php

namespace Pmvc\Core;

use \Pmvc\Core\Data;
use \Pmvc\Core\File;
use \Pmvc\Helpers\Date;

class validate {

    /** 
    * Check if given variable type is array.  
    * @param mixed input 
    * @return boolean
    */ 
    public static function isArray($input = false) {

        if ($input && Data::type($input) === 'array') {

            return true;
        }

        return false;
    }

    /** 
    * Check if given variable type is boolean.  
    * @param mixed input 
    * @return boolean
    */ 
    public static function isBool($input = false) {

        return self::isBoolean($input);
    }

    /** 
    * Check if given variable type is boolean.  
    * @param mixed input 
    * @return boolean
    */ 
    public static function isBoolean($input = false) {

        if ($input && is_bool($input)) {

            return true;
        }

        return false;
    }

    /** 
    * Check if input is a valid date. 
    * @param string input 
    * @param string format 
    * @return boolean
    */ 
    public static function isDate($input = false, $format = 'Y-m-d H:i:s') {

        if ($input && Date::isDate($input)) {

            return true;
        }

        return false;
    }

    /** 
    * Check if given input is a valid MAC address.   
    * @param string input 
    * @return boolean
    */ 
    public static function isMac($input = false) {

        if ($input && !filter_var($input, FILTER_VALIDATE_MAC) === false) {

            return true;
        }

        return false;
    }

    /** 
    * Check if given input is a valid e-mail address.   
    * @param string input 
    * @return boolean
    */ 
    public static function isEmail($input = false) {

        if ($input && !filter_var($input, FILTER_VALIDATE_EMAIL) === false) {

            return true;
        }

        return false;
    }

    /** 
    * Check if given variable type is float.  
    * @param mixed input 
    * @return boolean
    */ 
    public static function isFloat($input = false) {

        if ($input && is_float($input)) {

            return true;
        }

        return false;
    }

    /** 
    * Check if given variable type is integer.  
    * @param mixed input 
    * @return boolean
    */ 
    public static function isInt($input = false) {

        return self::isInteger($input);
    }

    /** 
    * Check if given variable type is integer.  
    * @param mixed input 
    * @return boolean
    */ 
    public static function isInteger($input = false) {

        if ($input && is_int($input)) {

            return true;
        }

        return false;
    }

    /** 
    * Check if given input is a valid IP address.   
    * @param mixed input 
    * @return boolean
    */ 
    public static function isIp($input = false) {

        if ($input && !filter_var($input, FILTER_VALIDATE_IP) === false) {

            return true;
        }

        return false;
    }

    /** 
    * Check if given input is valid JSON. 
    * @param string input 
    * @return boolean
    */ 
    public static function isJson($input = false) {

        if ($input && is_object(json_decode($input))) {

            return true;
        }

        return false;
    }

    /** 
    * Check the length of a string. 
    * @param string input 
    * @param int min value 
    * @param int max value 
    * @return boolean
    */ 
    public static function isLength($string = false, $min = 0, $max = false) {

        if ($string && strlen($string) >= $min) {

            if (!$max || strlen($string) <= $max) {

                return true;
            }
        }

        return false;
    }

    /** 
    * Check if given input is numeric.   
    * @param mixed input 
    * @return boolean
    */ 
    public static function isNumber($input = false) {

        return self::isNumeric($input);
    }

    /** 
    * Check if given input is numeric.   
    * @param mixed input 
    * @return boolean
    */ 
    public static function isNumeric($input = false) {

        if ($input && is_numeric($input)) {

            return true;
        }

        return false;
    }

    /** 
    * Check if given input is an object.  
    * @param mixed input 
    * @return boolean
    */ 
    public static function isObject($input = false) {

        if ($input && is_object($input)) {

            return true;
        }

        return false;
    }

    /** 
    * Check if given input is a string. 
    * @param mixed input 
    * @return boolean
    */ 
    public static function isString($input = false) {

        if ($input && is_string($input)) {

            return true;
        }

        return false;
    }

    /** 
    * Check if given input is of given type. 
    * @param mixed input 
    * @param string type 
    * @example isType('some text', 'string') - will return true 
    * @example isType('some text', 'object') - will return false  
    * @return boolean
    */ 
    public static function isType($input = false, $type = false) {

        if ($input && $type && Data::type($input) == $type) {

            return true;
        }

        return false;
    }

    /** 
    * Check if given input is a valid URL. 
    * @param mixed input 
    * @return boolean
    */ 
    public static function isUrl($input = false) {

        if ($input && !filter_var($input, FILTER_VALIDATE_URL) === false) {

            return true;
        }

        return false;
    }

    /** 
    * Check if given input is a ZIP file. 
    * @param string path to file 
    * @return boolean
    */ 
    public static function isZip($input = false) {

        if($input) {

            if(File::isFile($input) && File::extension($input) === 'zip') {

                return true;
            }
        }

        return false;
    }

}
