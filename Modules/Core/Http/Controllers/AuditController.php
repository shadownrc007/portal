<?php

namespace Modules\Core\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Core\Entities\AuditLog; // Asegúrate de que exista este modelo

class AuditController extends Controller
{
public function index()
{
    $audits = AuditLog::with('user')->latest()->get();
    return view('core::index', compact('audits'));
}
}


