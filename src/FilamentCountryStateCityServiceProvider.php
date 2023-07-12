<?php

namespace IbrahimBougaoua\FilamentCountryStateCity;

use Filament\PluginServiceProvider;
use IbrahimBougaoua\FilamentCountryStateCity\Commands\FilamentLocationInstallCommand;
use IbrahimBougaoua\FilamentCountryStateCity\Resources\CityResource;
use IbrahimBougaoua\FilamentCountryStateCity\Resources\CountryResource;
use IbrahimBougaoua\FilamentCountryStateCity\Resources\StateResource;
use Spatie\LaravelPackageTools\Package;

class FilamentCountryStateCityServiceProvider extends PluginServiceProvider
{
    protected array $resources = [
        CountryResource::class,
        StateResource::class,
        CityResource::class,
    ];

    public function packageBooted(): void
    {
        parent::packageBooted();
    }

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
            ->hasMigration('create_filament_country_state_city_table')
            ->hasCommand(FilamentLocationInstallCommand::class);
    }
}
