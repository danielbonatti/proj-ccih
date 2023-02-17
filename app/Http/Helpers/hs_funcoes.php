<?php

namespace App\Http\Helpers;

use DateTime;

class hs_funcoes {

    function hs_verida($wd_datnas, $wd_datcom){
        $date = new DateTime($wd_datnas);
        $interval = $date->diff(new DateTime($wd_datcom));
        $interval = $interval->format('%Y anos, %m meses e %d dias');
        return ($interval);
    }

}