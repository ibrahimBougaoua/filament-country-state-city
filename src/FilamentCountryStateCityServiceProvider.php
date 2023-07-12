<?php

namespace IbrahimBougaoua\FilamentCountryStateCity;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use IbrahimBougaoua\FilamentCountryStateCity\Commands\FilamentCountryStateCityCommand;

class FilamentCountryStateCityServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('filament-country-state-city')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_filament-country-state-city_table')
            ->hasCommand(FilamentCountryStateCityCommand::class);
    }
}
