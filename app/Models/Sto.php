<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sto extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['broj_stola', 'status'];

    protected $searchableFields = ['*'];

    public function narudzbina()
    {
        return $this->hasOne(Narudzbina::class);
    }
}
