<?php

namespace App\Controllers;

use App\Controller;
use App\Models\Collection;
use App\Services\CollectionService;
use App\Services\LessonService;

class LibraryController extends Controller
{
    public function index()
    {
        $this->render('404');
    }

    public function get_collections($iso){
        $data = array();

        $collection_service = new CollectionService();
        $lesson_service = new LessonService();

        $collections = $collection_service->get_all($iso);

        if(!$collections){
            $collections = array();
        }

        // for($i=0;$i<count($collections);$i++){
        //     $lessons = $lesson_service->get_some_for_collection($iso, $collections[$i]->id, 2);
        //     $collections[]
        // }
        $lessons = $lesson_service->get_all($iso);

        if(!$lessons){
            $lessons = array();
        }

        $data["collections"] = $collections;
        $data["lessons"] = $lessons;

        $this->render('library', $data);
    }
}