<?php

class config {

	public function get() {

		$keys = func_get_args();
		$configFile = file::get('../config/config.json');
		$value = false;

		if(!empty($configFile) && !empty($keys)) {

			$value = format::jsonToArray($configFile);

			foreach($keys as $number => $name) {

				if(is_object($value)) {

					$value = format::objectToArray($value);
				}

				if($number == 0 && isset($value[$name])) {

					$value = $value[$keys[0]];
				} else if($number != 0 && isset($value[$name])) {

					$value = $value[$name];
				}
			}

			return $value;
		} else if(!empty($configFile)) {

			$config = format::jsonToArray($configFile);
			return $config;
		}

		return false;
	}

	public static function set() {

		$keys = func_get_args();
		$configFile = file::get('../config/config.json');

		if(!empty($keys) && !empty($configFile)) {

			$config = format::jsonToArray($configFile);

			$c =& $config;
			foreach($keys as $key => $value) {

				if($key == (data::count($keys)-1)) {

					$c = $keys[data::count($keys)-1];
				} else {

					if(!isset($c[$value])) {
						$c[$value] = array();
					} 
					if(isset($c[$value]) && is_object($c[$value])) {
						$c[$value] = format::objectToArray($c[$value]);
					}
					$c =& $c[$value];
				}
			}

			$configJson = format::toJson($config, true);
			
			if(file::write('../config/config.json', $configJson)) {

				return true;
			} 
		}

		return false;
	}

}
