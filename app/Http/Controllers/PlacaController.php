<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Placa;

class PlacaController extends Controller {
    
    public function gestionarPlaca(Request $request) {
        // Check if it's a POST request (form submission)
        if ($request->isMethod('post')) {
            $request->validate([
                'placa' => 'required|string|max:10|unique:placas', // Unique validation added
            ]);

            // Attempt to create a new instance of the Placa model and save the data
            try {
                Placa::create([
                    'placa' => $request->input('placa'),
                ]);
            } catch (\Exception $e) {
                // Handle the exception, for example, show a custom error message
                return redirect()->back()->with('error', 'Error al guardar la placa. Asegúrate de que la placa sea única.');
            }

            return redirect()->back()->with('success', 'Placa guardada exitosamente.');
        }

        // If it's a GET request, retrieve paginated Placas data
        $placas = Placa::paginate(10); // Adjust the number per page as needed

        // Return the view with paginated Placas data
        return view('agregarPlaca', compact('placas'));
    }
}
