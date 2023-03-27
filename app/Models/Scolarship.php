<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scolarship extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'start_date',
        'end_date',
        'type',
        'specialty',
        'entry_level',
        'exam_type',
        'language',
        'training_period',
        'country',
        'description',
        'status',
    ];
}
