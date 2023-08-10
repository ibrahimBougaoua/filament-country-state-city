<?php

namespace IbrahimBougaoua\FilamentCountryStateCity\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    protected $table = 'filament_states';

    protected $fillable = [
        'name',
        'slug',
        'status',
        'country_id',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function cities()
    {
        return $this->hasMany(City::class, 'state_id');
    }
}
