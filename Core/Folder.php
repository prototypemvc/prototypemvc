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

    public static function find($fileName = false, $path = false) {

        if($fileName) {

            if(!$path) {

                $path = __DIR__;
            }

            if(self::isFolder($path)) {

                $dir = new \RecursiveDirectoryIterator($path);
                foreach (new \RecursiveIteratorIterator($dir) as $filePath) {
                    
                    if($fileName == basename($filePath)) {

                        return $filePath;
                    }
                }
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

        if($path && self::isFolder($path) && is_writable($path)) {

            return true;
        }

        return false;
    }

    /* Inspired by: https://gist.github.com/eusonlito/5099936 */ 
    public static function size($path = false, $format = 'bytes') {

        if($path && self::isFolder($path)) {

            $size = 0;
            foreach (glob(rtrim($path, '/').'/*', GLOB_NOSORT) as $each) {
                $size += is_file($each) ? filesize($each) : self::size($each);
            }

            switch ($format) {
                case 'bytes':
                    return $size;
                    break;
                case 'kb':
                    return Number::round(($size / 1024), 2);
                    break;
                case 'mb':
                    return Number::round(($size / 1048576), 2);
                    break;
            }
        }

        return false;
    }
}
