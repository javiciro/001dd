<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;


 class RolesController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('roles_permisos.roles', compact('roles'));
    }

    public function create()
    {
        // Puedes implementar la lógica para crear roles si es necesario
    }

    public function store(Request $request)
    {
        $role = Role::create(['name' => $request->input('nombre')]);
        return back();
    }

    public function edit(Role $role)
    {
        $permisos = Permission::all();
        return view('roles_permisos.rolPermiso', compact('role', 'permisos'));
    }

    public function update(Request $request, Role $role)
    {
        $role->permissions()->sync($request->permisos);
        return redirect()->route('roles.edit', $role);
    }

    public function destroy($id)
    {
        // Puedes implementar la lógica para eliminar roles si es necesario
    }
}