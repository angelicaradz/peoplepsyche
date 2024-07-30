<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Http\Controllers\AssessmentResultController;
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

    public function superadmin()
    {
        return $this->belongsToMany(Superadmin::class, 'superadmin_user', 'user_id', 'superadmin_id');
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }

    public function godsGift()
    {
        return $this->hasMany(GodsGiftTest::class);
    }

    public function request()
    {
        return $this->hasMany(PendingRequests::class);
    }

    public function test()
    {
        return $this->hasMany(Tests::class);
    }

    public function eligibleTaker()
    {
        return $this->hasOne(EligibleTaker::class);
    }

    public function isEligible()
    {
        // Assume 'eligible_users' is the table where eligibility is stored
        return $this->eligibleTaker()->exists();
    }
}
