<?php

namespace IbrahimBougaoua\FilamentCountryStateCity;

use Filament\Navigation\NavigationGroup;
use Filament\Tables\Columns\Layout\Panel;
use Filament\Contracts\Plugin;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Filament\PluginServiceProvider;
use IbrahimBougaoua\FilamentCountryStateCity\Commands\FilamentLocationInstallCommand;
use IbrahimBougaoua\FilamentCountryStateCity\Resources\CityResource;
use IbrahimBougaoua\FilamentCountryStateCity\Resources\CountryResource;
use IbrahimBougaoua\FilamentCountryStateCity\Resources\StateResource;
use Spatie\LaravelPackageTools\Package;

class FilamentCountryStateCityServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('filament-country-state-city')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_filament_country_state_city_table');
    }
}
