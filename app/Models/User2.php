<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User2 extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id_user';
    protected $fillable = [
        'username',
    	'password',
    	'nama_user',
    ];
}
