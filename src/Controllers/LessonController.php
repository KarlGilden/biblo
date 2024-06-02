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
        
        $this->render('lesson', $lesson);
    }
}