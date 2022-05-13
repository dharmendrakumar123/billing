<?php 

if(!function_exists('change_date_format')){

    function change_date_format($date,$format = 'Y-m-d H:i:s'){
        $timestamp = strtotime($date);
        
        $date = date($format,$timestamp);
        return $date;
    }
}