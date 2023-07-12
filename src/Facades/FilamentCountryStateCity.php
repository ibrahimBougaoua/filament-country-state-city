<?php

namespace IbrahimBougaoua\FilamentCountryStateCity\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \IbrahimBougaoua\FilamentCountryStateCity\FilamentCountryStateCity
 */
class FilamentCountryStateCity extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \IbrahimBougaoua\FilamentCountryStateCity\FilamentCountryStateCity::class;
    }
}
