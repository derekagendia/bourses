<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'address',
        'phone',
        'orientation',
        'certificates',
        'birth_certificate',
        'cni',
        'med_certificate',
        'stamp',
        'picture',
        'handicap',
        'is_handicap',
        'status',
        'first_choice',
        'first_choice_center',
        'first_choice_location',
        'second_choice',
        'second_choice_center',
        'second_choice_location',
        'third_choice',
        'third_choice_center',
        'third_choice_location',
        'user_id',
        'city',
        'region',
        'dob',
        'pob',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function choice_1()
    {
        return $this->belongsTo(Scolarship::class, 'first_choice');
    }

    public function choice_2()
    {
        return $this->belongsTo(Scolarship::class, 'second_choice');
    }

    public function choice_3()
    {
        return $this->belongsTo(Scolarship::class, 'third_choice');
    }



}
