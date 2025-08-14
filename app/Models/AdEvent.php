<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdEvent extends Model
{
    use HasFactory;

    protected $fillable = [
        'ad_id',
        'event',
        'session_id',
        'ip',
        'user_agent',
        'occurred_at',
    ];

    protected $casts = [
        'occurred_at' => 'datetime'
    ];


    public function add()
    {
        return $this->belongsTo(Ad::class);
    }
}
