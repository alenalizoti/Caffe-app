<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Narudzbina extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['user_id', 'racun_id', 'sto_id'];

    protected $searchableFields = ['*'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function stavkaNarudzbines()
    {
        return $this->hasMany(StavkaNarudzbine::class);
    }

    public function racun()
    {
        return $this->belongsTo(Racun::class);
    }

    public function sto()
    {
        return $this->belongsTo(Sto::class);
    }
}
