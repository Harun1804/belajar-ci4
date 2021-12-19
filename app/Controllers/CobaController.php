<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class CobaController extends BaseController
{
    public function index()
    {
        echo "Hello Dear";
    }

    public function about($name = null)
    {
        echo "Hai,".$name;
    }
}
