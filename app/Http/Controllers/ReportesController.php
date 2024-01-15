<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Facturacione;
use Illuminate\Support\Facades\Auth;

class ReportesController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::check()) {
            $user = Auth::user();
    
            $dateFilter = $request->input('date_filter');
    
            // Obtener la información de los clientes desde el controlador de conductores
            $conductoresController = new ConductoresController();
            $clientes = $conductoresController->getClientes($user->id);
    
            $query = Facturacione::where('user_id', $user->id);
            $informes = Facturacione::where('user_id', $user->id)->paginate(7);
    
            if ($dateFilter) {
                $query->whereDate('created_at', $dateFilter);
            }
    
            $informes = $query->selectRaw('DATE(created_at) as fecha, SUM(valor) as total')
                ->groupBy('created_at')
                ->get();
            
            $totalValor = $informes->sum('total');
    
            return view('reportes', compact('informes', 'totalValor', 'clientes'));
        } else {
            // Maneja el caso en el que el usuario no está autenticado
            return redirect()->route('login');
        }
    }
}