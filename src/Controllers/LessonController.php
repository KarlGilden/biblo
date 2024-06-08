<?php

namespace App\Controllers;

use App\Controller;
use App\Models\Lesson;
use App\Services\LessonService;

class LessonController extends Controller
{
    public function index()
    {
        $this->render('404');
    }

    public function get_lesson($iso, $id){
        $data = array();

        $lesson_service = new LessonService();

        $lesson = $lesson_service->get_single($iso, $id);

        if(!$lesson){
            $lesson = array();
        }

        $data["lesson"] = $lesson;
        $data["iso"] = $iso;

        $this->render('lesson', $data);
    }

    public function get_translation($iso, $text){
        $api_key = "&key=" . getenv("GOOGLE_TRANSLATE_API");
        $query = "&q=" . urlencode($text);
        $source = "&source=" . $iso;
        $target = "&target=en";
        $format = "&format=text";
        $url = "https://translation.googleapis.com/language/translate/v2?" . $api_key .$query . $source . $target . $format;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);  
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_TIMEOUT_MS, 10000);
        curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        if(curl_errno($ch))
            echo curl_error($ch);
        curl_close ($ch);
        
        if(!$response){
            echo "failed";
        }else{
            echo $response;
        }
    }
}