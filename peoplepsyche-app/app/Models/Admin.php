<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $guard = 'admin';

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
        'address2',
        'address3',
        'password',
        'role'
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
        'password' => 'hashed',
        'birthday' => 'date'
    ];

    // Accessor for full name with shortened middle name
    public function getFullNameAttribute()
    {
        return $this->givenName . ' ' . $this->middleInitial . ' ' . $this->lastName;
    }

    // Accessor for middle name initial
    public function getMiddleInitialAttribute()
    {
        return $this->middleName ? substr($this->middleName, 0, 1) . '.' : '';
    }

    public function accessCodes()
    {
        return $this->hasMany(AccessCode::class);
    }

    public function clients()
    {
        return $this->hasMany(User::class);
    }

    public function superadmins()
    {
        return $this->belongsToMany(Superadmin::class, 'superadmin_admin', 'admin_id', 'superadmin_id');
    }

    public function assessType()
    {
        return $this->hasMany(AssessType::class);
    }

    public function request()
    {
        return $this->hasMany(PendingRequests::class);
    }

    public function test()
    {
        return $this->hasMany(Tests::class);
    }

    public function godsGiftTest()
    {
        return $this->hasMany(GodsGiftTest::class);
    }
}
