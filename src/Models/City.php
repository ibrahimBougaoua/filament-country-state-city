<?php

namespace IbrahimBougaoua\FilamentCountryStateCity\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $table = 'filament_cities';

    protected $fillable = [
        'name',
        'slug',
        'status',
        'state_id',
    ];

    public function state()
    {
        return $this->belongsTo(Country::class, 'state_id');
    }
}
