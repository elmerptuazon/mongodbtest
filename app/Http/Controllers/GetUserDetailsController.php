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
        } else if ($type == 's') {
            //GET STUDENT DATA
            $teacher_id_url = 'http://localhost:3001/api/student/item/'.$id;
            $ch = curl_init();
            curl_setopt( $ch,CURLOPT_URL, $teacher_id_url);
            curl_setopt( $ch,CURLOPT_HTTPHEADER, ['stp:'.$_COOKIE['stp']]);
            curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
            $result = curl_exec($ch );
            curl_close( $ch );
        }
        
        return $result;
    }

    public static function getUserSubject($grade, $section) {

        $url_ = 'http://localhost:3003/api/subject/subjectlist/'.$grade.'/'.$section;
        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, $url_);
        curl_setopt( $ch,CURLOPT_HTTPHEADER, ['stp:'.$_COOKIE['stp']]);
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        $result = curl_exec($ch );
        curl_close( $ch );

        return $result;
    
    }

    public static function getUserAllEventsThisYear() {
        $yearToday = date('Y');
        $url_ = 'http://localhost:3005/api/event/list/'.$yearToday;
        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, $url_);
        curl_setopt( $ch,CURLOPT_HTTPHEADER, ['stp:'.$_COOKIE['stp']]);
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        $result = curl_exec($ch );
        curl_close( $ch );

        return $result;
    
    }

    public static function getUserAllMonthsPerEvents() {
        $yearToday = date('Y');
        $url_ = 'http://localhost:3005/api/event/monthslist/'.$yearToday;
        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, $url_);
        curl_setopt( $ch,CURLOPT_HTTPHEADER, ['stp:'.$_COOKIE['stp']]);
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        $result = curl_exec($ch );
        curl_close( $ch );

        return $result;
    
    }

    public static function getUserSubjectSchedule($grade, $section, $daySelected) {

        $url_ = 'http://localhost:3003/api/subject/schedule/list/'.$grade.'/'.$section.'/'.$daySelected;
        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, $url_);
        curl_setopt( $ch,CURLOPT_HTTPHEADER, ['stp:'.$_COOKIE['stp']]);
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        $result = curl_exec($ch );
        curl_close( $ch );

        return $result;
    
    }

    public static function getAllNotifications($uid) {

        $url_ = 'http://localhost:3004/api/notification/limited/result/'.$uid;
        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, $url_);
        curl_setopt( $ch,CURLOPT_HTTPHEADER, ['stp:'.$_COOKIE['stp']]);
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        $result = curl_exec($ch );
        curl_close( $ch );

        return $result;
    
    }

    public static function getAllUnreadNotification($uid) {

        $url_ = 'http://localhost:3004/api/notification/item/'.$uid;
        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, $url_);
        curl_setopt( $ch,CURLOPT_HTTPHEADER, ['stp:'.$_COOKIE['stp']]);
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        $result = curl_exec($ch );
        curl_close( $ch );

        return $result;
    
    }

}
