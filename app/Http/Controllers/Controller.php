<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public static function callOneAPI($method, $url, $headers = []) {
        $client = new Client();
        try {
            $result = $client->request($method, $url, $headers);
            $body = json_encode($result->getBody()->getContents());

            return json_decode($body);

        } catch(RequestException  $e) {
            $error = Psr7\str($e->getRequest());
            $error = Psr7\str($e->getResponse());

            return $error;
        }
        
        
        
    }

    public static function userInfoAfterLogin($access_token) {
        $user_info_headers = array(
            'headers' => [
                'Authorization' => 'Bearer '. base64_decode($access_token)
            ]
        );

        $results = self::callOneAPI('GET', 'http://127.0.0.1:8001/api/auth/user', $user_info_headers);

        return json_decode($results);
    }
}
