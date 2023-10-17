<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class parking extends Model
{
    protected $table      = "parking";
    protected $dates = [ 'created_at','updated_at' ];

    public $timestamps = true;

    protected $fillable =
        [
            "vehiculo_placa",
            "conductor_nombre",
            "entrada",
            "salida",
            "total",
            "formato_horas",
        ];
    protected $primaryKey = 'id'; // primary

}
