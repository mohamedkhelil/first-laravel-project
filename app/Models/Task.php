<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'completed',
        'priority',
        'user_id',
    ];

    protected function casts(): array
    {
        return [
            'completed' => 'boolean',
            'priority' => 'string',
        ];
    }

    public function scopeForUser(Builder $query, User $user): Builder
    {
        return $query->where('user_id', $user->id);
    }

    public function scopeCompleted(Builder $query): Builder
    {
        return $query->where('completed', true);
    }

    public function scopeOrderedByPriority(Builder $query): Builder
    {
        return $query->orderByRaw("CASE priority WHEN 'haute' THEN 1 WHEN 'moyenne' THEN 2 WHEN 'basse' THEN 3 ELSE 4 END");
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
