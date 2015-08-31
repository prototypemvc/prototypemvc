<?php

namespace Pmvc\Helpers;

use \DateTime;

class Date {

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

    public static function format($date = false, $format = 'Y-m-d H:i:s') {

        if($data) {

            $DateTime = new DateTime($date);
            return $DateTime->format($format);
        }

        return false;
    }

    public static function now($format = 'Y-m-d H:i:s') {

        $date = date($format);
        return self::format($date, $format);
    }

    // werkt nog niet helemaal, werkt alleen bij y-m-d, moet alle datum type accepteren!
    public static function isDate($date = false, $format = 'Y-m-d H:i:s') {

        if($date) {

             $DateTime = DateTime::createFromFormat($format, $date);
            return $DateTime && $DateTime->format($format) == $date;
        }
        
        return false;
    }

    public static function isValid($date = false, $format = 'Y-m-d H:i:s') {

        return self::isDate($date, $format);
    }

    public static function setTimezone($timezone = 'UTC') {

        date_default_timezone_set($timezone);
    }

}
