<?php

namespace App;

use Illuminate\Support\Facades\DB;

class Helper{
    public static function getCountData($tbl)
    {
        $data = DB::select('select * from '.$tbl.'');
        return count($data);
    }
}

?>