<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function projects() {
       return $this->hasMany(Project::class);
    }

    public function tasks() {
       return $this->hasMany(Task::class);
    }

    public function scopeById($query, $id) {
        return $this->where('id', $id);
    }
}
