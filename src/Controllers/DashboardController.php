<?php

namespace App\Controllers;

use App\Controller;
use App\Models\Collection;
use App\Services\CollectionService;

class DashboardController extends Controller
{
    public function index()
    {
        $this->render('404');
    }

    public function show_iso($iso)
    {
        $data = [$iso];
        $this->render('dashboard', $data);
    }

    public function get_collections($iso){
        $service = new CollectionService();
        $collections = $service->get_all_collections($iso);
        if(!$collections){
            $collections = ["nothing to display"];
        }
        $this->render('dashboard', $collections);
    }
}