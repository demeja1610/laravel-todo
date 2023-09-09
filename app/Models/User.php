<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @property-read int $id
 *
 * @property string $name
 * @property string $email
 * @property-read string $email_verified_at
 * @property-read string $password
 * @property-read string $remember_token
 *
 * @property-read \Carbon\Carbon $created_at
 * @property-read \Carbon\Carbon $updated_at
 *
 * @property-read \App\Models\Task $tasks
 *
 * @mixin \Illuminate\Database\Eloquent\Builder
 *
 * @inheritDoc
 */
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

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }
}
