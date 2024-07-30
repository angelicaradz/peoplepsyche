<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EligibleTaker extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'admin_id',
        'assess_type_id'
    ];

    public function client()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }

    public function request()
    {
        return $this->belongsTo(PendingRequests::class, 'request_id')->withTrashed();
    }

    public function assess_type()
    {
        return $this->belongsTo(AssessType::class, 'assess_type_id');
    }
}
