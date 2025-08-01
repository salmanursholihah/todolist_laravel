<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'sender_id',
        'receiver_id',
        'content',
        'attachment',
        'voice_note',
      
    ];

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function receiver()
    {
        
        return $this->belongsTo(User::class, 'receiver_id');
    }

    protected $casts = [
            'attachment' =>'array',
    ];
}
