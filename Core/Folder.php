<?php

namespace Pmvc\Core;

class Folder {

    public static function create($path = false, $mode = 0777) {

        if($path && !self::isFolder(dirname($path)) && self::isWritable(dirname($path))) {

            mkdir($path, $mode);

            if(Folder::isFolder($path)) {

                return true;
            }
        } 

        return false;
    }

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


    public function isWritable($path = false) {

        if($path && is_writable($path)) {

            return true;
        }

        return false;
    }
}
