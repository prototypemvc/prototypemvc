<?php 

namespace Pmvc\Core;

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

    /** 
    * Bypass namespaces. 
    * WARNING! Not recommended for use in a production environment because of 
    * poor performance. But fine in development for rapid prototyping.
    * @example instead of Pmvc\Core\Text::methodX simply use Text::methodX
    */
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
