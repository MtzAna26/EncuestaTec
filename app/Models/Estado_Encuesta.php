<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado_Encuesta extends Model
{
    use HasFactory;

    protected $table = "Estado_Encuesta";

    protected $fillable = [
        'Estado'
    ];
}
