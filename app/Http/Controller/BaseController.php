<?php

namespace App\Controller;

use Illuminate\Http\Request;

class BaseController
{
    public function view(Request $request)
    {
        return view("main");
    }
}