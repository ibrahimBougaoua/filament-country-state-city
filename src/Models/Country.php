<?php

namespace IbrahimBougaoua\FilamentCountryStateCity\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $table = 'filament_countries';

    protected $fillable = [
        'name',
        'slug',
        'flag',
        'status',
    ];

    public function states()
    {
        return $this->hasMany(State::class, 'country_id');
    }
}
