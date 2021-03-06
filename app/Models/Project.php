<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory, SoftDeletes, SoftCascadeTrait;

    protected $softCascade = ['tasks'];

    protected $fillable = [
        'name',
        'user_id',
    ];

    public static function boot() {
        parent::boot();

        static::deleted(function($project) {
            if ($project->isForceDeleting()) {
                $project->tasks()->forceDelete();
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function scopeById($query, $id) {
        return $this->where('id', $id);
    }
}
