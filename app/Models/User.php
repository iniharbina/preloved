<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    protected $table = 'user';
    protected $primaryKey = 'id_user';
    public $timestamps = false;  // Jika tabel tidak memiliki kolom created_at dan updated_at

    protected $fillable = [
        'nama_customer',
        'email_customer',
        'password',
        'no_hp',
        'foto',
        'status',
    ];

    // public function getAuthIdentifierName()
    // {
    //     return 'email_customer';
    // }


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
 /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];

}
