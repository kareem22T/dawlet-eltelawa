<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;

    protected $fillable = [
        'contestant_id',
        'voter_name',
        'voter_email',
        'voter_phone',
        'ip_address',
        'user_agent',
        'voted_at'
    ];

    protected $casts = [
        'voted_at' => 'datetime'
    ];

    /**
     * Get the contestant that was voted for
     */
    public function contestant()
    {
        return $this->belongsTo(Contestant::class);
    }

    /**
     * Check if user has already voted (by IP)
     */
    public static function hasVotedByIp($ip)
    {
        return self::where('ip_address', $ip)->exists();
    }

    /**
     * Check if user has already voted (by email)
     */
    public static function hasVotedByEmail($email)
    {
        return self::where('voter_email', $email)->exists();
    }
}