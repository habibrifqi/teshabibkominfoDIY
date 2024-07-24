<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Api extends Model
{
    use HasFactory;

    public static function plima(){

        $result = DB::select("
            select uc.id_user ,u.username ,c.course ,c.mentor,c.title  from user_course uc
            LEFT JOIN 
                courses c  ON c.id = uc.id_course 
            LEFT JOIN 
                users u  ON u.id = uc.id_user 
            where c.title like 'S.%'
        ");
        return $result;
    }
    public static function penam(){

        $result = DB::select("
    select uc.id_user ,u.username ,c.course ,c.mentor,c.title  from user_course uc
        LEFT JOIN 
            courses c  ON c.id = uc.id_course 
        LEFT JOIN 
            users u  ON u.id = uc.id_user 
        where c.title not like 'S.%'
        ");
        return $result;
    }
}
