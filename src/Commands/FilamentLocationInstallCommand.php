<?php

namespace IbrahimBougaoua\FilamentCountryStateCity\Commands;

use DB;
use IbrahimBougaoua\FilamentCountryStateCity\FilamentCountryStateCity;
use Illuminate\Console\Command;

class FilamentLocationInstallCommand extends Command
{
    public $signature = 'filament-location-install';

    public $description = 'Filament location install';

    public function handle(): int
    {
        if( FilamentCountryStateCity::hasMigrated() )
        {
            DB::unprepared(file_get_contents( __DIR__ . '\query.sql'));
            $this->comment('All done');
        } else {
            $this->comment('You are not migrate tables yet,please follow steps : ');
            $this->comment('php artisan vendor:publish --tag="filament-trace-migrations"');
            $this->comment('php artisan migrate');
            $this->comment('php artisan filament-location-install');
        }

        return self::SUCCESS;
    }
}
