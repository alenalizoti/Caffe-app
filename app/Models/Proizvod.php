<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Proizvod extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['naziv', 'opis', 'cena', 'image', 'kategorija_id'];

    protected $searchableFields = ['*'];

    public function stavkaNarudzbines()
    {
        return $this->hasMany(StavkaNarudzbine::class);
    }

    public function kategorija()
    {
        return $this->belongsTo(Kategorija::class);
    }
}
