<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssessCode extends Model
{
    protected $fillable = [
        'code',
        'request_id',
        'admin_id'
    ];

    public function assess_type()
    {
        return $this->belongsTo(AssessType::class, 'assess_type_id');
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }

    public function request()
    {
        return $this->belongsTo(PendingRequests::class, 'request_id');
    }
}
