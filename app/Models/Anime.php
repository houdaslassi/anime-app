<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Anime extends Model
{
    use HasFactory;
    use Searchable;

    public function shouldBeSearchable()
    {
        return $this->published === true;
    }
}
