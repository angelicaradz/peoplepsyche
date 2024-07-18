<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssessType extends Model
{
    protected $fillable = [
        'name'
    ];

    public function assessCode()
    {
        return $this->hasMany(AssessCode::class);
    }

    public function test()
    {
        return $this->belongsToMany(Tests::class, 'assess_type_test');
    }

    public function request()
    {
        return $this->hasMany(PendingRequests::class);
    }
}
