<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class AsignarController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('roles_permisos.listUser', compact('users'));
    }

    public function create()
    {
        // Puedes implementar la lógica para cZar usuarios si es necesario
    }

    public function store(Request $request)
    {
        // Puedes implementar la lógica para aZacenar usuarios si es necesario
    }

    public function edit(string $id)
    {
        $user = User::find($id);
        $roles = Role::all();
        return view('roles_permisos.userRol', compact('user', 'roles'));
    }

    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        $user->roles()->sync($request->roles);
        return redirect()->route('asignar.edit', $user);
    }

    public function destroy(string $id)
    {
        // Puedes implementar la lógica para eliminar usuarios si es necesario
    }
}
