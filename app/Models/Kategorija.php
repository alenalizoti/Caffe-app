<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kategorija extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['naziv'];

    protected $searchableFields = ['*'];

    public function proizvods()
    {
        return $this->hasMany(Proizvod::class);
    }
}
