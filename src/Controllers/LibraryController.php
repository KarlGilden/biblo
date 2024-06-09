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

    public function select_language()
    {
        $this->render('selection');
    }

    public function get_collections($iso){
        $data = array();

        $collection_service = new CollectionService();
        $lesson_service = new LessonService();

        $collections = $collection_service->get_all($iso);

        if(!$collections){
            $collections = array();
        }

        $lessons = $lesson_service->get_all($iso);

        if(!$lessons){
            $lessons = array();
        }

        $data["collections"] = $collections;
        $data["lessons"] = $lessons;
        $data["iso"] = $iso;
        $data["title"] = "Library";
        $data["nav_color"] = "nav-dark";

        $this->render('library', $data);
    }
}