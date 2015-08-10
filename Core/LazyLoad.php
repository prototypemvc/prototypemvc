<?php 

namespace Pmvc\Core;

/* 
* LazyLoad
* 
* Bypass namespaces 
*
* set Config::set('namespaces', 'false');
*
* For example: instead Pmvc\Core\Text simply use Text,
* NOT RECOMMENDED in a production environment because of 
* poor performance. But fine in development for rapid prototyping.
*/
class LazyLoad {

    private static $classes = array(
        // core
        'Config',
        'Controller',
        'Data',
        'Error',
        'File', 
        'Folder',
        'Format',
        'Load',
        'Logger',
        'Model',
        'Number',
        'Text',
        'Validate',
        'View',
        // helpers
        'Database',
        'Date',
        'Password',
        'Session',
        'Url'
    );

    public static function on() {

        foreach(self::$classes as $k => $class) {
            if (!class_exists($class)) {
               if(class_exists('Pmvc\Core\\' . $class)) {
                    class_alias('Pmvc\Core\\' . $class, $class);
               } else if(class_exists('Pmvc\Helpers\\' . $class)) {
                    class_alias('Pmvc\Helpers\\' . $class, $class);
               }
            }
        }
    }
}
