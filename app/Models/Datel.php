<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datel extends Model
{
    use HasFactory;
    protected $table="datel";
    protected $primaryKey = "id_datel";
    protected $fillable = [
        'nama_datel',
    ];
}
