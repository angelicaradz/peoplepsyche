<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'givenName',
        'middleName',
        'lastName',
        'suffixName',
        'email',
        'cpNumber',
        'birthday',
        'sex',
        'civilStat',
        'religion',
        'address',
        'password',
        'role',
        'admin_id'
    ];

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
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function admins()
    {
        return $this->belongsToMany(Admin::class, 'admin_user', 'client_id', 'admin_id');
        // return $this->belongsTo(Admin::class);
    }

    public function clients()
    {
        return $this->belongsToMany(User::class, 'admin_user', 'admin_id', 'client_id');
    }
}
