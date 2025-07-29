<?php

namespace Modules\Users\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Models\User;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::with('roles')->latest()->get();
        return view('users::index', compact('users'));
    }

    public function enable($id)
{
    $user = User::findOrFail($id);
    
    // Solo si ya está desactivado
    if ($user->status === 'disabled') {
        $user->status = 'enabled';
        $user->save();
    }

    return redirect()->route('users.list')->with('success', 'Usuario activado correctamente.');
}

    public function toggleStatus($id)
{
    $user = User::findOrFail($id);

    $user->status = $user->status === 'enabled' ? 'disabled' : 'enabled';
    $user->save();

    return redirect()->route('users.list')->with('success', 'Estado del usuario actualizado.');
}


}
