<?php

namespace Prototypemvc\Core;

class Folder {

    /** 
    * Create an empty folder.  
    * @param string path to file (including filename)
    * @param int folder permission 
    * @example create('folder/newFolder') 
    * @return boolean
    */ 
    public static function create($path = false, $mode = 0777) {

        if($path && !self::isFolder(dirname($path)) && self::isWritable(dirname($path))) {

            mkdir($path, $mode);

            if(Folder::isFolder($path)) {

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

    /** 
    * Get list of all files in a given directory. 
    * @param string path to folder   
    * @return array of files in the directory
    */ 
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

    /** 
    * Check if folder exists. 
    * @param string path to folder   
    * @return boolean  
    */ 
    public static function isFolder($path = false) {

        if ($path && is_dir($path)) {

            return true;
        }

        return false;
    }


    /** 
    * Check if a folder is writable (current user has permission to write). 
    * @param string path to folder 
    * @return boolean  
    */ 
    public static function isWritable($path = false) {

        if($path && self::isFolder($path) && is_writable($path)) {

            return true;
        }

        return false;
    }
 
    /** 
    * Get size of a given folder. 
    * Inspired by: https://gist.github.com/eusonlito/5099936 
    * @param string path to folder 
    * @param string format 
    * @example size('folder') 
    * @example size('folder', 'kb') 
    * @example size('folder', 'mb') 
    * @return int size of file in given format   
    */ 
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
 
    /** 
    * Compress / zip a given folder. 
    * thanks to Alix Axel & Raohmaru : http://stackoverflow.com/questions/1334613/how-to-recursively-zip-a-directory-in-php
    * @param string path to source folder 
    * @param string path to destination folder 
    * @example zip('folder', 'folder/compressed'); 
    * @return boolean
    */ 
    public static function zip($source = false, $destination = false) {

        if($source) {

            if(!$destination) {
                $destination = $source;
            }

            if (!extension_loaded('zip') || !file_exists($source)) {
                return false;
            }

            $zip = new \ZipArchive();
            if (!$zip->open($destination, \ZIPARCHIVE::CREATE)) {
                return false;
            }

            $source = str_replace('\\', '/', realpath($source));

            if (is_dir($source) === true) {
                $files = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($source), \RecursiveIteratorIterator::SELF_FIRST);

                foreach ($files as $file) {
                    $file = str_replace('\\', '/', $file);

                    // Ignore "." and ".." folders
                    if( in_array(substr($file, strrpos($file, '/')+1), array('.', '..')) )
                        continue;

                    $file = realpath($file);

                    if (is_dir($file) === true) {
                        $zip->addEmptyDir(str_replace($source . '/', '', $file . '/'));
                    } else if (is_file($file) === true) {
                        $zip->addFromString(str_replace($source . '/', '', $file), file_get_contents($file));
                    }
                }
            } else if (is_file($source) === true) {
                $zip->addFromString(basename($source), file_get_contents($source));
            }

            return $zip->close();
        }

        return false;
    }
}
