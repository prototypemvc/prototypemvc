<?php

namespace Prototypemvc\Helpers;

use \DateTime;

class Date {

    /** 
    * Get time difference between two dates. If no second date is given, 
    * the first date will be .... against the current date. 
    * @param string first date 
    * @param string second date 
    * @param string format 
    * @example difference('2015-01-01') - will return the difference in seconds 
    * between 1st of january 2015 and now 
    * @example difference('2015-01-01', '2015-01-02') - will return difference 
    * in seconds between 1st of january 2015 and 2nd of january 2015
    * @example difference('2015-01-01', '2015-01-02', 'days') - will return difference 
    * in hours  between 1st of january 2015 and 2nd of january 2015
    * @return int difference in chosen format, seconds by default 
    */ 
    public static function difference($date1 = false, $date2 = false, $format = 'seconds') {

        if (!$date1 || !self::isValid($date1)) {
            return false;
        }

        if (!empty($date2) && !self::isValid($date2)) {
            $format = $date2;
            $date2 = false;
        }

        if (!$date2) {
            $date2 = self::now();
        }

        $datetime1 = new DateTime($date1);
        $datetime2 = new DateTime($date2);
        $interval = $datetime1->diff($datetime2);

        $total = $interval->format('%y');
        if ($format == 'years') {
            return $total;
        }
        $total = ($total * 12) + $interval->format('%m');
        if ($format == 'months') {
            return $total;
        }
        $total = $interval->format('%a');
        if ($format == 'days') {
            return $total;
        }
        $total = ($total * 24) + ($interval->h);
        if ($format == 'hours') {
            return $total;
        }
        $total = ($total * 60) + ($interval->i);
        if ($format == 'minutes') {
            return $total;
        }
        $total = ($total * 60) + ($interval->s);
        if ($format == 'seconds') {
            return $total;
        }
    }
    
    /** 
    * Get date in given format. 
    * @param string date 
    * @param string format 
    * @return string date in specified format 
    */ 
    public static function format($date = false, $format = 'Y-m-d H:i:s') {

        if($data) {

            $DateTime = new DateTime($date);
            return $DateTime->format($format);
        }

        return false;
    }

    /** 
    * Get current date in given format. 
    * @param string format 
    * @return string date in specified format 
    */ 
    public static function now($format = 'Y-m-d H:i:s') {

        $date = date($format);
        return self::format($date, $format);
    }

    /** 
    * Check if date is valid. 
    * @param string date 
    * @param string format 
    * @return boolean 
    */ 
    public static function isDate($date = false, $format = 'Y-m-d H:i:s') {

        if($date) {

            $DateTime = DateTime::createFromFormat($format, $date);
            return $DateTime && $DateTime->format($format) == $date;
        }
        
        return false;
    }

    /** 
    * Check if date is valid. 
    * @param string date 
    * @param string format 
    * @return boolean 
    */ 
    public static function isValid($date = false, $format = 'Y-m-d H:i:s') {

        return self::isDate($date, $format);
    }

    /** 
    * Set script default timezone. 
    * @param string timezone  
    */ 
    public static function setTimezone($timezone = 'UTC') {

        date_default_timezone_set($timezone);
    }

}
