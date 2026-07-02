<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    //Aquí se pone las columnas que se van a llenar en la base de datos
    protected $fillable = [
        'nombre_prod',
        'id_tipo'
    ];
}
