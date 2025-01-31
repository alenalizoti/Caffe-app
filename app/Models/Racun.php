<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Racun extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['iznos', 'vrsta_placanja'];

    protected $searchableFields = ['*'];

    public function narudzbina()
    {
        return $this->hasOne(Narudzbina::class);
    }
}
