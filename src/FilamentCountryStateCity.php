<?php

namespace IbrahimBougaoua\FilamentCountryStateCity;
use Schema;

class FilamentCountryStateCity
{
    public static function hasMigrated() : bool
    {
        if( Schema::hasTable('filament_countries') &&
            Schema::hasTable('filament_states') &&
            Schema::hasTable('filament_cities')
        )
            return true;
        return false;
    }
}
