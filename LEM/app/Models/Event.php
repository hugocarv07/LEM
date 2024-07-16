<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'name',
        'city',
        'description',
        'image',
        'Pdf',
        'user_id',
        'Orientador',
        'ppg'
    ];
}
