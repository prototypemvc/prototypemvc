<?php

namespace Prototypemvc\Blocks;

use \Prototypemvc\Blocks\Folder;
use \Prototypemvc\Blocks\Number;

class File {

    /** 
    * Append string to a file.  
    * @param string path to file 
    * @param string content 
    * @example append('folder/log.txt', 'New log message!') 
    * @return boolean
    */ 
    public static function append($file = false, $content = false) {

        if ($file && $content) {

            if (file_put_contents($file, $content, FILE_APPEND)) {

                return true;
            }
        }

        return false;
    }

    /** 
    * Empty a file.  
    * @param string path to file 
    * @return boolean
    */ 
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

    /** 
    * Create an empty file.  
    * @param string path to file (including filename)
    * @example create('folder/log.txt')  
    * @return boolean
    */ 
    public static function create($file = false) {

        if ($file) {

            if (fopen($file, 'w')) {

                return true;
            }
        }

        return false;
    }

    /** 
    * Force a file download by setting headers.  
    * @param string path to file 
    * @param string extension 
    * @param string file name on client side  
    * @example download('folder/error_log.pdf') 
    * @example download('folder/error_log.pdf', 'pdf' ,'log.pdf')  
    * @return boolean
    */ 
    public static function download($path = false, $extension = false, $name = false) {

        if($path && File::isFile($path)) {

            if(!$extension) {
                $extension = File::extension($path);
            }

            if(!$name) {
                $name = basename($path);
            }

            header('Content-Type: application/' . $extension);
            header("Content-Transfer-Encoding: Binary");
            header("Content-disposition: attachment; filename=" . $name);
            readfile($path);
            exit();
        }

        return false;
    }

    /** 
    * Get the extension of a given file.  
    * @param string path to file 
    * @return string entension of file without '.'
    */ 
    public static function extension($file = false) {

        if ($file && self::isFile($file)) {

            return pathinfo($file, PATHINFO_EXTENSION);
        }

        return false;
    }
    
    /** 
    * Extract a given zip file. 
    * @param string path to file 
    * @param string path to destination  
    * @example append('folder/log.zip', 'folder/otherFolder'); 
    * @return boolean
    */ 
    public static function extract($file = false, $destination = false) {

        if($file) {

            if(!$destination) {
                $destination = __DIR__;
            }

            if(!Folder::isFolder($destination)) {
                if(!Folder::create($destination)) {
                    return false;
                }
            }

            $zip = new \ZipArchive;
            $res = $zip->open($file);
            if ($res === true) {
              $zip->extractTo($destination);
              $zip->close();
              return true;
            } 
        }

        return false;
    }

    /** 
    * Find file with a given name inside a given directory. 
    * @param string name of the file to find 
    * @param string directory to scan  
    * @example find('log.txt', 'folder') 
    * @return string full path to file 
    */ 
    public static function find($fileName = false, $path = false) {

        return Folder::find($filename, $path);
    }

    /** 
    * Get file content. 
    * @param string path to file 
    * @return string content of the file 
    */ 
    public static function get($file = false) {

        if ($file && self::isFile($file)) {

            return file_get_contents($file);
        }

        return false;
    }

    /** 
    * Check if file exists. 
    * @param string path to file 
    * @return boolean  
    */ 
    public static function isFile($file = false) {

        if ($file && is_file($file)) {

            return true;
        }

        return false;
    }

    /** 
    * Check if a file is writable (current user has permission to write). 
    * @param string path to file 
    * @return boolean  
    */ 
    public static function isWritable($path = false) {

        if($path && self::isFile($path) && is_writable($path)) {

            return true;
        }

        return false;
    }

    /** 
    * Delete a file. 
    * @param string path to file 
    * @return boolean  
    */ 
    public static function remove($file = false) {

        if ($file) {

            if (unlink($file)) {

                return true;
            }
        }

        return false;
    }

    /** 
    * Get size of a given file. 
    * @param string path to file 
    * @param string format 
    * @example size('folder/log.txt') 
    * @example size('folder/log.txt', 'kb') 
    * @example size('folder.log.txt', 'mb') 
    * @return int size of file in given format   
    */ 
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

    /** 
    * Extract a given zip file. 
    * @param string path to file 
    * @param string path to destination  
    * @example append('folder/log.zip', 'folder/otherFolder'); 
    * @return boolean
    */ 
    public static function unzip($file = false, $destination = false) {

        return self::extract($file, $destination);
    }

    /** 
    * Append string to a file.  
    * @param string path to file 
    * @param string content 
    * @example write('folder/log.txt', 'New log message!') 
    * @return boolean
    */ 
    public static function write($file = false, $content = false) {

        if ($file && $content) {

            if (file_put_contents($file, $content)) {

                return true;
            }
        }

        return false;
    }

}
