<?php

namespace Pmvc\Core;

use \Pmvc\Core\Format;
use \Pmvc\Core\Data;
use \Pmvc\Core\File;

class Config {

    /** 
    * Get value(s) from config. 
    * @param use params to move deeper into array 
    * @example get() - get complete config
    * @example get('meta') - get array of all meta data
    * @example get('meta', 'title') - get meta title (string)
    * @return string || array 
    */ 
    public static function get() {

        $keys = func_get_args();
        $config = self::getConfig();
        $value = $config;

        if (!empty($config) && !empty($keys)) {

            foreach ($keys as $number => $name) {

                if (is_object($value)) {

                    $value = Format::objectToArray($value);
                }

                if ($number == 0 && isset($value[$name])) {

                    $value = $value[$keys[0]];
                } else if ($number != 0 && isset($value[$name])) {

                    $value = $value[$name];
                } else {

                    return false;
                }
            }

            return $value;
        } else if (!empty($config)) {

            return $config;
        }

        return false;
    }

    /** 
    * Set value(s) in config. 
    * @param use params to move deeper into array 
    * @param last param is the value you want to set 
    * @example set('meta', 'title', 'Great title') - set meta title to 'Great title'
    * @return boolean
    */ 
    public static function set() {

        $keys = func_get_args();
        $config = self::getConfig();

        if (!empty($keys) && !empty($config)) {

            $c = & $config;
            foreach ($keys as $key => $value) {

                if ($key == (Data::count($keys) - 1)) {

                    $c = $keys[Data::count($keys) - 1];
                } else {

                    if (!isset($c[$value])) {
                        $c[$value] = array();
                    }
                    if (isset($c[$value]) && is_object($c[$value])) {
                        $c[$value] = Format::objectToArray($c[$value]);
                    }
                    $c = & $c[$value];
                }
            }

            $configJson = Format::toJson($config, true);

            if (File::write('../config/custom.config.json', $configJson)) {

                return true;
            }
        }

        return false;
    }

    /** 
    * Stack custom config on top of default config to get a complete config array.  
    * @param use params to move deeper into array 
    * @return array with merged config 
    */ 
    private static function getConfig() {

        $default = Format::jsonToArray(File::get('../config/default.config.json'));
        $custom = Format::jsonToArray(File::get('../config/custom.config.json'));

        if ($default && $custom) {

            return self::merge($default, $custom);
        } else if ($default) {

            return $default;
        }

        return false;
    }

    /** 
    * Merge two arrays. 
    * @param array first array
    * @param array second array
    * @return array the two arrays combined into one
    * Thanks to Wojtazzz on stackoverflow, http://stackoverflow.com/questions/20550442/merging-arrays-and-overwriting-value-when-keys-are-equal
    */ 
    private static function merge($array1, $array2) {

        foreach (array_keys($array2) as $key) {
            if (isset($array1[$key])) {
                unset($array1[$key]);
            }
        }
        return $array1 + $array2;
    }

}