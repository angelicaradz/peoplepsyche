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
        return $this->belongsToMany(Tests::class, 'assess_types_test', 'assess_type_id', 'test_id');
    }

    public function request()
    {
        return $this->hasMany(PendingRequests::class);
    }
}
