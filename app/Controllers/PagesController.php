<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class PagesController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Home'
        ];
        echo view('layouts/header',compact('data'));
        echo view('pages/home');
        echo view('layouts/footer');
    }

    public function about()
    {
        $data = [
            'title' => 'About Me'
        ];
        echo view('layouts/header',compact('data'));
        echo view('pages/about');
        echo view('layouts/footer');
    }
}
