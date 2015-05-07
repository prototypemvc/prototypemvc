<?php 

class format {

	public static function arrayToJson($array = false) {

		if($array && validate::isArray($array)) {

			return json_encode($array);
		}

		return false;
	}

	public static function arrayToString($array = false, $delimiter = ' ') {

		if($array && validate::isArray($array)) {

			return implode($delimiter, $array );
		}

		return false;
	}

	public static function csvToArray($csv = false) {

		if($csv) { 

			return str_getcsv($csv);
		}

		return false;
	}

	public static function jsonToArray($json = false) {

		if($json && validate::isJson($json)) { 
		
			return json_decode($json);
		}

		return false;
	}

	public static function stringToArray($string = false, $delimiter = ' ') {

		if($string && validate::isString($string)) {

			return explode($delimiter, $string);
		}

		return false;
	}

	public static function toBool($var = false) {

		return self::toBoolean($var);
	}

	public static function toBoolean($var = false) {

		if($var) { 

			$boolean = (bool) $var;
			if(validate::isBoolean($boolean)) {

				return $boolean;
			}
		}

		return false;
	}

	public static function toFloat($var = false) {

		if($var && validate::isNumber($var)) {
		
			$float = (float) $var;
			if(validate::isFloat($float)) {

				return $float;
			}
		}

		return false;
	}

	public static function toInt($var = false) {

		return self::toInterger($var);
	}

	public static function toInteger($var = false) {

		if($var && validate::isNumber($var)) {
			
			$integer = (int) $var;
			if(validate::isInteger($integer)) {

				return $integer;
			}
		}

		return false;
	}

	public static function toJson($input = false) {

		if($input) {

			switch (data::type($input)) {
				case 'array':
					$json = self::arrayToJson($input);
					break;
				case 'object':
					$json = self::objectToJson($input);
					break;
			}

			if(validate::isJson($json)) {

				return $json;
			}
		}

		return false;
	}

	public static function toString($var = false) {

		if($var) {

			$string = (string) $var;
			if(validate::isString($string)){

				return $string;
			}
		}
		
		return false;
	}


	public static function objectToArray($object) {

		if($object && validate::isObject($object)) {

			return (array) $object;
		}

		return false;
	}

	public static function arrayToObject($array = false) {

		if($array && validate::isArray($array)) {

			$object = new stdClass();

			foreach ($array as $key => $value) {

			    $object->$key = $value;
			}

			return $object;
		}

		return false;
	}

	public static function objectToJson($object = false) {

		if($object && validate::isObject($object)) {

			$array = self::objectToArray($object);
			return self::arrayToJson($array);
		}

		return false;
	}

	public static function toObject($input = false) {

		if($input) {

			switch (data::type($input)) {
				case 'array':
					$object = self::arrayToObject($input);
					break;
				case 'object':
					$object = $input;
					break;
			}

			if(validate::isObject($object)) {

				return $object;
			}
		}

		return false;
	}

	public static function toArray($input = false) {

		if($input) {

			switch (data::type($input)) {
				case 'array':
					$array = $input;
					break;
				case 'object':
					$array = self::arrayToObject($input);
					break;
			}

			if(validate::isObject($object)) {

				return $object;
			}
		}

		return false;
	}
	
}
