<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TipKorisnika extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['naziv'];

    protected $searchableFields = ['*'];

    protected $table = 'tip_korisnikas';

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
