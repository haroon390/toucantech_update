<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OUser extends Model
{
    use HasFactory;

    protected $table= 'ousers';

    protected $fillable = [
        'name',
        'email',
        'school',
    ];

}
