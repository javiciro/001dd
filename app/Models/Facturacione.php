<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facturacione extends Model
{
    protected $table = 'facturaciones'; // Nombre de la tabla en la base de datos

    protected $fillable = [
        'cliente_nombre',
        'observacion',
        'valor',
        'num_factura',
        'correo_cliente',
        'direccion_cliente',
        'telefono_cliente',
        'correo_enviado',
        'user_id',
        'created_at',
        'numero_factura',
        'estado',
        'leido',
        'num_placa',
        
   
    ];

    /**
     * Define a belongsTo relationship with the User model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}

