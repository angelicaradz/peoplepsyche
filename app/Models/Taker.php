<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Taker extends Model
{
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

    public function assess_type()
    {
        return $this->belongsTo(AssessType::class, 'assess_type_id');
    }
}
