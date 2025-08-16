<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'updtated_at',
        'status',
        'start_date',
        'plan_id',
        'order_id',
        'id',
        'details',
        'expired_at',
        'end_date',
        'created_at',
    ];

    protected $casts = [
        'details' => 'array',
        'expired_at' => 'datetime',
    ];

    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
