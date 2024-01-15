<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Facturacione;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class TesoreriaController extends Controller
{
    public function index(Request $request)
    {
        // Start with an unfiltered query
        $datos = Facturacione::query();
    
        // Apply filters conditionally
        if ($request->filled('start_date')) {
            // Include records up to the end of the day
            $datos->where('created_at', '>=', $request->input('start_date') . ' 00:00:00')
                  ->where('created_at', '<=', $request->input('start_date') . ' 23:59:59');
        }
    
        if ($request->filled('user_id')) {
            $datos->where('user_id', $request->input('user_id'));
        }
    
        if ($request->filled('search')) {
            $search = $request->input('search');
            $datos->where(function ($query) use ($search) {
                $query->where('cliente_nombre', 'like', "%$search%")
                    ->orWhere('observacion', 'like', "%$search%")
                    ->orWhere('numero_factura', 'like', "%$search%");
            });
        }
    
        // Get all users (modify this based on your application logic)
        $users = User::all(); // Change this to fit your user retrieval logic
    
        // Sum of Values
        $sumaValores = $datos->sum('valor');
    
        // Get all data after applying filters
        $datos = $datos->get();
    
        // Pass the $users variable to the view
        return view('tesoreria', compact('datos', 'sumaValores', 'users'));
    }

    public function editarEstado(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'estado' => 'required|in:pendiente,entregado',
        ]);

        try {
            // Find the record by ID
            $dato = Facturacione::findOrFail($id);

            // Update the 'estado' field
            $dato->estado = $request->estado;
            $dato->save();

            return redirect()->back()->with('success', 'Estado actualizado correctamente.');
        } catch (\Exception $e) {
            Log::error('Error al editar el estado: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error al editar el estado.');
        }
    }
}
