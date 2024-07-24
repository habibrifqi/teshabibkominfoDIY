<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Users extends Model
{
    public static function get_jumlah_statistik()
    {
        $result = DB::select("
        SELECT COUNT(a.*) as total_count
        FROM trx_indicator a
        WHERE
        a.active_st = 'yes'
        ");
        $totalCount = $result[0]->total_count;
        return $totalCount;
    }
}
