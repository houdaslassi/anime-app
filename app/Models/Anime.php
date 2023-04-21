<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Anime extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'title',
        'description',
        'image_url',
        'episodes',
        'status',
        'type',
        'published'
    ];

    protected $casts = [
        'published' => 'boolean'
    ];

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function shouldBeSearchable()
    {
        return $this->published === true;
    }
}
