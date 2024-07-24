<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Dashboard extends Model
{
    use HasFactory;

    public static function getdatabyuser($id)
    {
        $result = DB::select("
      select uc.id_user ,u.username ,c.course ,c.mentor,c.title  from user_course uc
        LEFT JOIN 
            courses c  ON c.id = uc.id_course 
        LEFT JOIN 
            users u  ON u.id = uc.id_user 
            where u.id = ?
        ",[$id]);
        return $result;
       
    }

    public static function getdataall()
    {
        $result = DB::select("
        select uc.id_user ,u.username ,c.course ,c.mentor,c.title  from user_course uc
            LEFT JOIN 
                courses c  ON c.id = uc.id_course 
            LEFT JOIN 
                users u  ON u.id = uc.id_user 
        ");
        return $result;
       
    }

    public static function datachart(){

        $result = DB::select("
         SELECT c.course,c.mentor,c.title, COUNT(uc.id_user) AS user_count
        FROM courses c
        JOIN user_course uc ON c.id = uc.id_course
        GROUP BY c.course,c.mentor ,c.title ;
        ");
        return $result;
    }
    public static function datachartfee(){

        $result = DB::select("
         SELECT c.mentor,c.title, COUNT(uc.id_user) as a, COUNT(uc.id_user) * 2000000 AS total_amount
            FROM courses c
            JOIN user_course uc ON c.id = uc.id_course
            GROUP by c.mentor ,c.title ;
        ");
        return $result;
    }
}
