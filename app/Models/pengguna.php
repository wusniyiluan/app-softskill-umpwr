<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class pengguna extends Model
{
    protected $table = 'pengguna';
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = [
        'email', 'user_role', 'username', 'password'
    ];
}

