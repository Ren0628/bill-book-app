<?php

namespace App\Lib;

class My_func
{
    public static function wareki($year)
    {
        $eras = array(
            array('year' => 2018, 'name' => 'R'),
            array('year' => 1988, 'name' => 'H'),
            array('year' => 1925, 'name' => 'S'),
        );
    
        foreach($eras as $era) {
    
            $base_year = $era['year'];
            $era_name = $era['name'];
    
            if($year > $base_year) {
    
                $era_year = $year - $base_year;
    
                return $era_name . $era_year;
            }
    
        }
        return null;
    }
}