<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Facturacione;
use App\Models\Placa;
use Illuminate\Support\Facades\Mail;
use App\Mail\enviarCorreo;
use Illuminate\Support\Facades\Auth;
use PDF;
use Illuminate\Support\Str;

class ConductoresController extends Controller
{

    public function create()
    {
        $placas = Placa::all();

        $numFactura = 'FACT-' . strtoupper(Str::random(8));

        while (Facturacione::where('num_factura', $numFactura)->exists()) {
            $numFactura = 'FACT-' . strtoupper(Str::random(8));
        }

        $valor = 0;

        return view('entregas.create', compact('numFactura', 'valor', 'placas'));
    }

    public function index()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $clientes = Facturacione::where('user_id', $user->id)->paginate(7);
            return view('conductores', compact('clientes', 'user'));
        } else {
            return redirect()->route('login');
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'num_placa' => 'required',
            'cliente_nombre' => 'required|string|max:255',
            'observacion' => 'nullable|string',
            'correo_cliente' => 'required|email',
            'direccion_cliente' => 'nullable|string',
            'numero_factura' => 'nullable|string',
        ]);

        $user = Auth::user();

        if ($user) {
            $request->merge(['valor' => (int)str_replace(['.', ','], '', $request->input('valor'))]);

            $numFactura = 'ORDEN-' . strtoupper(Str::random(8));

            while (Facturacione::where('num_factura', $numFactura)->exists()) {
                $numFactura = 'ORDEN-' . strtoupper(Str::random(8));
            }

            $request->merge(['num_factura' => $numFactura, 'user_id' => $user->id]);

            try {
                $cliente = Facturacione::create($request->all());
                $cliente->correo_enviado = false;
                $cliente->save();

                $pdf = PDF::loadView('entregas.envio-correo', ['cliente' => $cliente]);
                $pdfContent = $pdf->output();
                $pdfPath = storage_path('app/public/') . 'factura.pdf';
                $pdf->save($pdfPath);

                Mail::to($cliente->correo_cliente)
                    ->send(new enviarCorreo($cliente, $pdfContent));

                \Storage::delete($pdfPath);

                return redirect()->route('conductores.index')->with('success', 'Cliente creado correctamente y correo enviado.');
            } catch (\Exception $e) {
                return redirect()->route('conductores.create')->with('error', 'Error al crear el cliente: ' . $e->getMessage());
            }
        } else {
            return redirect()->route('login')->with('error', 'No se pudo realizar la operación. Por favor, inicia sesión.');
        }
    }

    public function getClientes($userId)
    {
        $clientes = Facturacione::where('user_id', $userId)->get();
        return $clientes;
    }

    // ... (other methods)
}
