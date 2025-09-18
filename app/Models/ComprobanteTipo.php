<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Venta;

class ComprobanteTipo extends Model
{
    protected $table = 'comprobante_tipos';
    protected $primaryKey = 'codigo';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'codigo',
        'descripcion',
    ];

    public function ventas()
    {
        return $this->hasMany(Venta::class, 'comprobante_tipo_codigo', 'codigo');
    }
}
