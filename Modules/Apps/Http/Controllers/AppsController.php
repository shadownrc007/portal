<?php

namespace Modules\Apps\Http\Controllers;

use Illuminate\Routing\Controller;

class AppsController extends Controller
{
    public function index()
    {
        return view('apps::index');
    }

    public function calendar()
    {
        return view('apps::calendar');
    }
}
