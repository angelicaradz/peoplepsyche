<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class GodsGiftTest extends Model
{
    protected $fillable = [
        'user_id',
        'strengths',
        'weaknesses'
        // 'strength_A',
        // 'strength_C',
        // 'strength_E',
        // 'strength_F',
        // 'strength_G',
        // 'strength_H',
        // 'strength_I',
        // 'strength_L',
        // 'strength_M',
        // 'strength_N',
        // 'strength_O',
        // 'strength_Q1',
        // 'strength_Q2',
        // 'strength_Q3',
        // 'strength_Q4',
        // 'weakness_A',
        // 'weakness_C',
        // 'weakness_E',
        // 'weakness_F',
        // 'weakness_G',
        // 'weakness_H',
        // 'weakness_I',
        // 'weakness_L',
        // 'weakness_M',
        // 'weakness_N',
        // 'weakness_O',
        // 'weakness_Q1',
        // 'weakness_Q2',
        // 'weakness_Q3',
        // 'weakness_Q4',

    ];

    // Ensure strengths and weaknesses are cast to arrays when retrieved from the database
    protected $casts = [
        'strengths' => 'array',
        'weaknesses' => 'array',
    ];

    public function client()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function test(): MorphMany
    {
        return $this->morphMany(Tests::class, 'testable');
    }
}
