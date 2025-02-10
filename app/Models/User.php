<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use App\Models\Scopes\Searchable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use HasFactory;
    use Searchable;
    use HasApiTokens;

    protected $fillable = [
        'ime',
        'prezime',
        'username',
        'password',
        'tip_korisnika_id',
        'plata',
    ];

    protected $searchableFields = ['*'];

    protected $hidden = ['password', 'remember_token'];

    public function tipKorisnika()
    {
        return $this->belongsTo(TipKorisnika::class);
    }

    public function narudzbinas()
    {
        return $this->hasMany(Narudzbina::class);
    }

    public function isSuperAdmin(): bool
    {
        return in_array($this->email, config('auth.super_admins'));
    }
}
