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
        return view('pages/home',compact('data'));
    }

    public function about()
    {
        $data = [
            'title' => 'About Me'
        ];
        return view('pages/about',compact('data'));
    }

    public function contact()
    {
        $data = [
            'title' => 'Contact Us',
            'alamat' => [
                [
                    'tipe' => 'rumah',
                    'alamat' => 'jl.lalla resident',
                    'kota' => 'x'
                ],[
                    'tipe' => 'kantor',
                    'alamat' => 'sadwadsf',
                    'kota' => 'y'
                ]
            ]
        ];
        return view('pages/contact',compact('data'));
    }
}
