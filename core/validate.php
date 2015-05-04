<?php 

class validate {

    public static function isArray($array = false) {

        if($array && data::type($array) === 'array') {

            return true;
        }
        
        return false;
    }

    public static function isEmail($input = false) {

    	if ($input && !filter_var($input, FILTER_VALIDATE_EMAIL) === false) {

    		return true;
    	}

    	return false;
    }

    public static function isFloat($input = false) {

        if($input && is_float($input)) {

            return true;
        }

        return false;
    }

    public static function isInt($input = false) {

        if($input && is_int($input)) {

            return true;
        }

        return false;
    }

    public static function isIp($input = false) {

    	if ($input && !filter_var($input, FILTER_VALIDATE_IP) === false) {

    		return true;
    	}

    	return false;
    }

    public static function isJson($string = false) {

        if ($string && is_object(json_decode($string))) { 

            return true;
        }
        
        return false;
    }

    public static function isLength($input = false, $min = 0, $max = false) {

        if ($input && strlen($input) >= $min) {
            
            if (!$max || strlen($input) <= $max) {

                return true;
            }
        } 

        return false;
    }

    public static function isNumber($input = false) {

        if($input && is_numeric($input)) {

            return true;
        }

        return false;
    }

    public static function isString($input = false) {

        if($input && is_string($input)) {

            return true;
        }

        return false;
    }

    public static function isUrl($input) {

    	if ($input && !filter_var($input, FILTER_VALIDATE_URL) === false) {

    		return true;
    	}

    	return false;
    }
	
}
