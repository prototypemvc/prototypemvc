<?php

class Session {

	private static $_sessionStarted = false;

	public static function init(){

		if(self::$_sessionStarted == false) {

			session_start();
			self::$_sessionStarted = true;
		}

	}

	public static function get() {

		$keys = func_get_args();
		$value = $_SESSION;

		if(!empty($value) && !empty($keys)) {

			foreach($keys as $number => $name) {

				if($number == 0 && isset($value[$name])) {

					$value = $value[$keys[0]];
				} else if($number != 0 && isset($value[$name])) {

					$value = $value[$name];
				}
			}

			return $value;
		} else if(!empty($value)) {

			return $value;
		}

		return false;
	}

	public static function set($key,$value){
		$keys = func_get_args();
		$session = $_SESSION;

		if(!empty($keys) && !empty($session)) {

			$s =& $session;
			foreach($keys as $key => $value) {

				if($key == (data::count($keys)-1)) {

					$s = $keys[data::count($keys)-1];
				} else {

					if(!isset($s[$value])) {
						$s[$value] = array();
					} 
					if(isset($s[$value]) && is_array($s[$value])) {
						$s[$value] = $s[$value];
					}
					$s =& $s[$value];
				}
			}

			$_SESSION = $session;
			return true;
		}

		return false;
	}

	public static function destroy(){

		if(self::$_sessionStarted == true) {

			session_unset();
			session_destroy();
			return true;
		}

	}

}
