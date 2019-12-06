<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\GetUserDetailsController;

class DashboardController extends Controller
{
    public function index() {

        // GET USER DATA
        $headers = array
            (
                'Authorization: Bearer '.base64_decode($_COOKIE['stp'])
            );
    
        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, 'http://127.0.0.1:8001/api/auth/user' );
        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        $result = curl_exec($ch );
        curl_close( $ch );

        $decode_result = json_decode($result);
        $details['user_data'] = [];
        foreach($decode_result as $key=>$val) {
            array_push($details['user_data'], (object)array($key=>$val));
        }

        // GET TEACHER DATA
        $decode_result = json_decode(GetUserDetailsController::index($details['user_data'][0]->id, $details['user_data'][3]->type));

        $details['identity_data'] = [];
        foreach($decode_result as $key=>$val) {
            array_push($details['identity_data'], (object)array($key=>$val));
        }
        // GET ALL HOMEWORK
        $teacher_id_url = 'http://127.0.0.1:8003/api/homework/edit/view/data/'.$details['user_data'][0]->id;
        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, $teacher_id_url);
        curl_setopt( $ch,CURLOPT_HTTPHEADER, ['stp:'.$_COOKIE['stp']]);
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        $result = curl_exec($ch );
        curl_close( $ch );

        $decode_result = json_decode($result);

        $details['homework_data'] = [];
        foreach($decode_result as $key=>$val) {
            array_push($details['homework_data'], $val);
        }

        return view('dashboard', $details);
    }
}
