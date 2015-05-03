<?php 

class validate {

    public static function isArray($array = false) {

        if($array && data::type($array) === 'array') {

            return true;
        }
        
        return false;
    }

    public static function isEmail($input) {

    	if (!filter_var($input, FILTER_VALIDATE_EMAIL) === false) {

    		return true;
    	}

    	return false;
    }

    public static function isIp($input) {

    	if (!filter_var($input, FILTER_VALIDATE_IP) === false) {

    		return true;
    	}

    	return false;
    }

    public static function isJson($string) {

        if (is_object(json_decode($string))) { 

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

    public static function isUrl($input) {

    	if (!filter_var($input, FILTER_VALIDATE_URL) === false) {

    		return true;
    	}

    	return false;
    }
	
}
