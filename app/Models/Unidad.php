<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unidad extends Model
{
    protected $table = 'unidades';
    protected $primaryKey = 'codigo';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'codigo',
        'descripcion',
    ];

    public function productos()
    {
        return $this->hasMany(Producto::class, 'unidad_codigo', 'codigo');
    }
}
