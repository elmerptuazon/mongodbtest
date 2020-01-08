<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\GetUserDetailsController;

class DashboardController extends Controller
{
    public static function index_STUDENT($info) {

        print_r($info);
        die();

        return view('STUDENT.dashboard', $details);
    }
}
