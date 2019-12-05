<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Redirector;

class LoginCheck extends Controller
{
    public function loginAuthenticate(Request $request) {

        $data['username'] = $request->input('email');
        $data['password'] = $request->input('password');
        $data['remember_me'] = empty($request->input('remember_me')) ? false : true;

        $headers = array
        (
            'Content-Type: application/json',
            'X-Requested-With: XMLHttpRequest'
        );

        $post = array
        (
            'email'=>$data['username'],
            'password'=>$data['password'],
            'remember_me'=>$data['remember_me'],
        );

        $ch = curl_init();
		curl_setopt( $ch,CURLOPT_URL, 'http://127.0.0.1:8001/api/auth/login' );
		curl_setopt( $ch,CURLOPT_POST, true );
		curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
		curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
		curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $post ) );
		$result = curl_exec($ch );
        curl_close( $ch );

        $decodeResult = json_decode($result);

        $details['arr_login'] = [];
        foreach($decodeResult as $key=>$val) {
            if($key == "access_token") {
                array_push($details['arr_login'], $val);
            }
        }
        $cookie_name = "stp";
        $cookie_value = $details['arr_login'][0];
        setcookie($cookie_name, $cookie_value, time() + (10 * 365 * 24 * 60 * 60), "/");      

        if(empty($details['arr_login'])) {
            return redirect()->back()->with('error', 'Incorrect Credentials. Please try again.');
        } else {
            return redirect()->action('DashboardController@index');
        }

    }
}
