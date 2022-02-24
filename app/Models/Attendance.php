<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    /**
     * Atributos que são atribuidos em massa.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id'
    ];
}
