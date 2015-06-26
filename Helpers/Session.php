<?php

namespace Pmvc\Helpers;

use Pmvc\Core\Config;
use Pmvc\Core\Data;

class Session {

    private static $_sessionStarted = false;

    public static function init() {

        if (self::$_sessionStarted == false) {

            self::start();
            self::$_sessionStarted = true;
        }

        // thanks Jon, http://stackoverflow.com/questions/8311320/how-to-change-the-session-timeout-in-php
        $now = time();
        if (isset($_SESSION['expiration_time']) && $now > $_SESSION['expiration_time']) {

            self::destroy();
            self::start();
        }

        $timeout = 3600;
        if (!empty(Config::get('session', 'timeout'))) {

            $timeout = Config::get('session', 'timeout');
        }

        $_SESSION['expiration_time'] = $now + $timeout;
    }

    public static function get() {

        $keys = func_get_args();
        $value = $_SESSION;

        if (!empty($value) && !empty($keys)) {

            foreach ($keys as $number => $name) {

                if ($number == 0 && isset($value[$name])) {

                    $value = $value[$keys[0]];
                } else if ($number != 0 && isset($value[$name])) {

                    $value = $value[$name];
                }
            }

            return $value;
        } else if (!empty($value)) {

            return $value;
        }

        return false;
    }

    public static function set() {
        $keys = func_get_args();
        $session = $_SESSION;

        if (!empty($keys) && !empty($session)) {

            $s = & $session;
            foreach ($keys as $key => $value) {

                if ($key == (Data::count($keys) - 1)) {

                    $s = $keys[Data::count($keys) - 1];
                } else {

                    if (!isset($s[$value])) {
                        $s[$value] = array();
                    }
                    if (isset($s[$value]) && is_array($s[$value])) {
                        $s[$value] = $s[$value];
                    }
                    $s = & $s[$value];
                }
            }

            $_SESSION = $session;
            return true;
        }

        return false;
    }

    public static function destroy() {

        if (self::$_sessionStarted == true) {

            session_unset();
            session_destroy();
            return true;
        }
    }

    public static function start() {

        session_start();
    }

}
