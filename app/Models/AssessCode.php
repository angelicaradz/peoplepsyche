<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class AssessCode extends Model
{
    protected $fillable = [
        'code',
        'assess_type_id',
        'request_id',
        'admin_id',
        'user_id'
    ];

    public function admin()
    {
        return $this->hasOneThrough(Admin::class, PendingRequests::class, 'id', 'id', 'request_id', 'admin_id');
    }

    public function request()
    {
        return $this->belongsTo(PendingRequests::class, 'request_id')->withTrashed();
    }

    public function assess_type()
    {
        return $this->hasOneThrough(AssessType::class, PendingRequests::class, 'id', 'id', 'request_id', 'assess_type_id');
    }

    public function client()
    {
        return $this->hasOneThrough(User::class, PendingRequests::class, 'id', 'id', 'request_id', 'user_id');
    }
}
