<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Siape extends Authenticatable
{
    use HasFactory, Notifiable;
    // protected $connection = 'conexaoExterna';
    // protected $table = 'Siape';
    // protected $primaryKey = 'Matricula_Siape';
    // protected $guard = 'login';
    // public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */

}
