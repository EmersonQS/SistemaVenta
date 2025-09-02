<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = [
        'unidad_codigo',
        'afectacion_tipo_codigo',
        'codigo',
        'nombre',
        'descripcion',
        'imagen',
        'precio_unitario'
    ];

    public function unidad()
    {
        return $this->belongsTo(Unidad::class, 'unidad_codigo', 'codigo');
    }

    public function afectacionTipo()
    {
        return $this->belongsTo(AfectacionTipo::class, 'afectacion_tipo_codigo', 'codigo');
    }
}
