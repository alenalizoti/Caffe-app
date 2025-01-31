<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StavkaNarudzbine extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['kolicina', 'proizvod_id', 'narudzbina_id'];

    protected $searchableFields = ['*'];

    protected $table = 'stavka_narudzbines';

    public function proizvod()
    {
        return $this->belongsTo(Proizvod::class);
    }

    public function narudzbina()
    {
        return $this->belongsTo(Narudzbina::class);
    }
}
