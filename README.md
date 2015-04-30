#Version 2 has been relased [https://github.com/simple-mvc-framework/v2](https://github.com/simple-mvc-framework/v2)
#What is Simple MVC Framework?

Simple MVC Framework is a PHP 5.3 MVC system. It's designed to be lightweight and modular, allowing developers to build better and easy to maintain code with PHP.

The base framework comes with a few helper classes, this is to keep code bloat down to a minimum. Classes can easily be added at any stage of development.

## Documentation

Full docs & tutorials are available at [simplemvcframework.com](http://simplemvcframework.com)

##Requirements

 The framework requirements are limited

 - Web Server
 - PHP 5.3 or greater is required

 Although a database is not required, if a database is to be used the system is designed to work with a MySQL database. The framework can be changed to work with another database type.

###Recommended
 mod_rewrite - To remove the index.php from the URL. Otherwise index.php?url= is required

## Installation

1. Download the framework
2. Unzip the package.
3. Upload the framework files to your server. Normally the index.php file will be at your root.
4. Open the index.php file with a text editor and set your base URL and database credentials (if a database is needed). Set the default theme and controller to be loaded.
5. If using a Linux server edit .htaccess file and save the base path.

## Acknowledgement

I'd like to thank [Jessie](http://jream.com/) from jream.com, for producing an excellent video series on making an MVC system, this framework was evolved from that foundation.

