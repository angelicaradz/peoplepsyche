<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class AssessmentResult extends Model
{
    protected $fillable = [
        'eligible_taker_id',
        'user_id',
        'assess_type_id',
        'admin_id',
        'tests_id'
    ];

    public function eligibleTaker()
    {
        return $this->belongsTo(EligibleTaker::class, 'eligible_taker_id')->withTrashed();
    }

    public function client()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function assess_type()
    {
        return $this->belongsTo(AssessType::class, 'assess_type_id');
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }

    public function test()
    {
        return $this->belongsTo(Tests::class, 'tests_id');
    }
}
