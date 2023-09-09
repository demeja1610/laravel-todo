<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @property-read int $id
 *
 * @property string $title
 * @property-read int $user_id
 * @property-read bool $favorite
 * @property-read \Carbon\Carbon $completed_at
 *
 * @property-read \Carbon\Carbon $created_at
 * @property-read \Carbon\Carbon $updated_at
 * @property-read \Carbon\Carbon $deleted_at
 *
 * @property-read \App\Models\User $user
 *
 * @mixin \Illuminate\Database\Eloquent\Builder
 *
 * @inheritDoc
 */
class Task extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'user_id',
        'completed_at',
        'favorite',
    ];

    protected $casts = [
        'favorite' => 'boolean',
        'completed_at' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
