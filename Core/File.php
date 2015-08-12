<?php

namespace Pmvc\Core;

use Pmvc\Core\Number;

class File {

    public static function append($file = false, $content = false) {

        if ($file && $content) {

            if (file_put_contents($file, $content, FILE_APPEND)) {

                return true;
            }
        }

        return false;
    }

    public static function clear($file = false) {

        if ($file && self::isFile($file)) {

            $f = @fopen($file, "r+");
            if ($f !== false) {
                ftruncate($f, 0);
                fclose($f);

                return true;
            }
        }

        return false;
    }

    public static function create($file = false) {

        if ($file) {

            if (fopen($file, 'w')) {

                return true;
            }
        }

        return false;
    }

    public static function extension($file = false) {

        if ($file && self::isFile($file)) {

            return pathinfo($file, PATHINFO_EXTENSION);
        }

        return false;
    }

    public static function get($file = false) {

        if ($file && self::isFile($file)) {

            return file_get_contents($file);
        }

        return false;
    }

    public static function isFile($file = false) {

        if ($file && is_file($file)) {

            return true;
        }

        return false;
    }

    public function isWritable($path = false) {

        if($path && self::isFile($path) && is_writable($path)) {

            return true;
        }

        return false;
    }

    public static function remove($file = false) {

        if ($file) {

            if (unlink($file)) {

                return true;
            }
        }

        return false;
    }

    public static function size($file = false, $format = 'bytes') {

        if ($file && self::isFile($file)) {

            $size = filesize($file);

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

    public function write($file = false, $content = false) {

        if ($file && $content) {

            if (file_put_contents($file, $content)) {

                return true;
            }
        }

        return false;
    }

}
