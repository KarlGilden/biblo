<?php

namespace App\Controllers;

use App\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $data["title"] = "Home";
        
        $this->render('index', $data);
    }
}