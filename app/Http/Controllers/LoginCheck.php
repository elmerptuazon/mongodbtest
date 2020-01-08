<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Http\Redirector;
use App\Http\Controllers\DashboardController;

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

        $login_headers = array(
            'form_params' => $post,
            'headers' => $headers
        );
        $results = $this->callOneAPI('POST', 'http://127.0.0.1:8001/api/auth/login', $login_headers);
        $getResults = json_decode($results);

        if(!isset($getResults->access_token)) {
            return redirect()->back()->with('error', 'Incorrect Login E-Mail Address or Password.');
        }

        $user_info = $this->userInfoAfterLogin($getResults->access_token);

        DashboardController::index_STUDENT($user_info);

        // print_r($user_info);
        die();
        
        return redirect()->action('DashboardController@index');

    }
}
