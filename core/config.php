<?php

namespace \pmvc\core;

use \pmvc\core\format;
use \pmvc\core\data;
use \pmvc\core\file;

class config {

    public function get() {

        $keys = func_get_args();
        $config = self::getConfig();
        $value = $config;

        if (!empty($config) && !empty($keys)) {

            foreach ($keys as $number => $name) {

                if (is_object($value)) {

                    $value = format::objectToArray($value);
                }

                if ($number == 0 && isset($value[$name])) {

                    $value = $value[$keys[0]];
                } else if ($number != 0 && isset($value[$name])) {

                    $value = $value[$name];
                }
            }

            return $value;
        } else if (!empty($config)) {

            return $config;
        }

        return false;
    }

    public static function set() {

        $keys = func_get_args();
        $config = self::getConfig();

        if (!empty($keys) && !empty($config)) {

            $c = & $config;
            foreach ($keys as $key => $value) {

                if ($key == (data::count($keys) - 1)) {

                    $c = $keys[data::count($keys) - 1];
                } else {

                    if (!isset($c[$value])) {
                        $c[$value] = array();
                    }
                    if (isset($c[$value]) && is_object($c[$value])) {
                        $c[$value] = format::objectToArray($c[$value]);
                    }
                    $c = & $c[$value];
                }
            }

            $configJson = format::toJson($config, true);

            if (file::write('../config/custom.config.json', $configJson)) {

                return true;
            }
        }

        return false;
    }

    public function getConfig() {

        $default = format::jsonToArray(file::get('../config/default.config.json'));
        $custom = format::jsonToArray(file::get('../config/custom.config.json'));

        if ($default && $custom) {

            return self::merge($default, $custom);
        } else if ($default) {

            return $default;
        }

        return false;
    }

    /* Thanks to Wojtazzz on stackoverflow, http://stackoverflow.com/questions/20550442/merging-arrays-and-overwriting-value-when-keys-are-equal */

    private function merge($array1, $array2) {

        foreach (array_keys($array2) as $key) {
            if (isset($array1[$key])) {
                unset($array1[$key]);
            }
        }
        return $array1 + $array2;
    }

}
