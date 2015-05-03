<?php 

class format {

	public static function arrayToJson($array = false) {

		if($array && validate::isArray($array)) {

			return json_encode($array);
		}

		return false;
	}

	public static function arrayToString($array = false, $delimiter = ' ') {

		if($array) {

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

		if($json) { 
		
			return json_decode($json);
		}

		return false;
	}

	public static function stringToArray($string = false, $delimiter = ' ') {

		if($string) {

			return explode($delimiter, $string);
		}

		return false;
	}

	public static function toBool($var = false) {

		if($var) { 
			return (bool) $var;
		}

		return false;
	}

	public static function toFloat($var) {

		if($var) {
		
			return (float) $var;
		}

		return false;
	}

	public static function toInt($var = false) {

		if($var) {
			
			return (int) $var;
		}

		return false;
	}

	public static function toJson($input = false) {

		if($input && data::type($input)) {

			switch (data::type($input)) {
				case 'array':
					return self::arrayToJson($input);
					break;
			}
		}

		return false;
	}

	public static function toString($var = false) {

		if($var) {

			return (string) $var;
		}
		
		return false;
	}


	/*public static function objectToArray($object) {

		//...
	}

	public static function arrayToObject($array) {

		//...
	}

	public static function toObject($input) {

		//...
	}

	public static function toArray($input) {

		//...
	}*/	
	
}
