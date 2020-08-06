<?php

namespace App\User;

use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
    protected $fillable = [
        'user_id', 'attachment'
    ];
}
