<?php

namespace App\Controllers;

use App\Controller;

class ResourceController extends Controller
{
    public function index()
    {
        $data["title"] = "Resources";
        
        $this->render('resources', $data);
    }
}