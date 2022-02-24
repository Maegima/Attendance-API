<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    /**
     * Atributos que são atribuidos em massa.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'cpf',
        'username',
        'password'
    ];

    /**
     * Atributos que devem ser escondidos para a serialização.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password'
    ];
}
