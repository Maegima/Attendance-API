<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    /**
     * Atributos que são atribuidos em massa.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description'
    ];
    public $timestamps = false;
}
