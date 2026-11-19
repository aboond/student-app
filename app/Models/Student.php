<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'date_of_birth',
        'class_name',
        'status',
        'photo_path'
    ];
    public function guardians()
    {
        return $this->hasMany(Guardian::class);
    }
}
