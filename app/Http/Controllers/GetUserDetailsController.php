<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class GetUserDetailsController extends Controller
{
    public static function index($id, $type) {
        
        if($type == 't') {
            // GET TEACHER DATA
            $teacher_id_url = 'http://127.0.0.1:8002/api/teacher/view/'.$id;
            $ch = curl_init();
            curl_setopt( $ch,CURLOPT_URL, $teacher_id_url);
            curl_setopt( $ch,CURLOPT_HTTPHEADER, ['stp:'.$_COOKIE['stp']]);
            curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
            $result = curl_exec($ch );
            curl_close( $ch );
        } else {

        }
       
    
        return $result;
    }
}
