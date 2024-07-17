<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Tests extends Model
{
    protected $fillable = [
        'name',
        'testable_id',
        'testable_type'
    ];

    public function assess_type()
    {
        return $this->belongsToMany(AssessType::class, 'assess_type_test');
    }

    public function testable(): MorphTo
    {
        return $this->morphTo();
    }
}
