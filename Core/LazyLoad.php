<?php 

namespace Prototypemvc\Core;

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
    * @example instead of Prototypemvc\Core\Text::methodX simply use Text::methodX
    */
    public static function on() {

        foreach(self::$classes as $k => $class) {
            if (!class_exists($class)) {
               if(class_exists('Prototypemvc\Core\\' . $class)) {
                    class_alias('Prototypemvc\Core\\' . $class, $class);
               } else if(class_exists('Prototypemvc\Helpers\\' . $class)) {
                    class_alias('Prototypemvc\Helpers\\' . $class, $class);
               }
            }
        }
    }
}
