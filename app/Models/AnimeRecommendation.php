<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AnimeRecommendation extends Model
{
    use HasFactory;

    protected $fillable = [
        'anime_id',
        'recommended_anime_id',
        'similarity_score',
        'reason'
    ];

    protected $casts = [
        'similarity_score' => 'decimal:4'
    ];

    public function anime(): BelongsTo
    {
        return $this->belongsTo(Anime::class, 'anime_id');
    }

    public function recommendedAnime(): BelongsTo
    {
        return $this->belongsTo(Anime::class, 'recommended_anime_id');
    }
}
