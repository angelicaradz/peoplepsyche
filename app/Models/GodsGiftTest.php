<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Facades\Auth;

class GodsGiftTest extends Model
{
    protected $fillable = [
        'user_id',
        'admin_id',
        'strengths',
        'weaknesses'
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

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }

    // Define a method to create or update Tests entries
    public function syncTests()
    {

        $user_id = Auth::id();
        $admin_id = Auth::user()->admin_id;

        // Check if the testable_id and testable_type are set
        if ($this->exists) {
            $test = $this->test()->updateOrCreate(
                [],
                [
                    'name' => 'Gods Gift Test',
                    'user_id' => $user_id,
                    'admin_id' => $admin_id
                ]
            );
        }
    }

    protected static function boot()
    {
        parent::boot();

        static::saved(function ($godsgifttest) {
            $godsgifttest->syncTests();
        });
    }
}
