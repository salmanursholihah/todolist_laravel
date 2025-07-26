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
        'created_at',
        'updated_at',    
    ];
}
