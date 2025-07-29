<?php
namespace Modules\Dashboard\Http\Controllers;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard::index', [
            'simplePage' => false,
            'title'      => 'Dashboard',

           
        ]);
    }
}
