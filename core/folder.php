<?php

namespace \pmvc\core;

class folder {

    public static function get($path = false) {

        if ($path && self::isFolder($path)) {

            $list = array();

            $tmpList = scandir($path);

            foreach ($tmpList as $k => $item) {

                if ($item != '.' && $item != '..' && $item != '.DS_Store') {
                    $list[] = $item;
                }
            }

            return $list;
        }

        return false;
    }

    public static function isFolder($path = false) {

        if ($path && is_dir($path)) {

            return true;
        }

        return false;
    }

}
