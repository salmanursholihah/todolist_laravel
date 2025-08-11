<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Task;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

// ... seperti yang kamu kirim ...

public function tasks()
{
    return $this->hasMany(Task::class);
}


public function catatans()
{
    return $this->hasMany(Catatan::class);
}

public function Keuangans()
{
    return $this->hasMany(related: keuangan::class);
}
public function Absensi()
{
    return $this->hasMany(Absensi::class);
}

public function subscriptions()
{
    return $this->hasMany(Subscription::class);
}
 

}
