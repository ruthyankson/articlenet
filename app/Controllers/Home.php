<?php

namespace App\Controllers;

class Home extends BaseController
{
    // Display the home page
    public function index(): string
    {
        return view('pages/home');
    }
}
