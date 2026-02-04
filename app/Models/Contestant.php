<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contestant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'age',
        'city',
        'image',
        'votes_count',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'votes_count' => 'integer',
        'age' => 'integer'
    ];

    /**
     * Get all votes for this contestant
     */
    public function votes()
    {
        return $this->hasMany(Vote::class);
    }

    /**
     * Increment vote count
     */
    public function incrementVotes()
    {
        $this->increment('votes_count');
    }

    /**
     * Scope for active contestants
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope for ordering by votes
     */
    public function scopeOrderByVotes($query, $direction = 'desc')
    {
        return $query->orderBy('votes_count', $direction);
    }

    /**
     * Get image URL
     */
    public function getImageUrlAttribute()
    {
        return $this->image ? asset('storage/' . $this->image) : asset('assets/imgs/default-contestant.png');
    }
}