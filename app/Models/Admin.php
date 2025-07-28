<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    protected $table = 'admins';
    protected $fillable = [
        'fullname',
        'email',
        'password_hash',
        'created_at',
        'update_at',
        'created_by',
        'updated_by',
    ];
    protected $hidden = [
        'password_hash',
        'remember_token',
    ];

    public $timestamps = false;

    protected function casts(): array
    {
        return [
            'password_hash' => 'hashed',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    public function created_by()
    {
        return $this->belongsTo(Admin::class, 'created_by');
    }

    public function updated_by()
    {
        return $this->belongsTo(Admin::class, 'updated_by');
    }
}

