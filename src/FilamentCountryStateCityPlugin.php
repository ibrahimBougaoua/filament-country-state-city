<?php

declare(strict_types=1);

namespace IbrahimBougaoua\FilamentCountryStateCity;

use Filament\Contracts\Plugin;
use Filament\Panel;
use IbrahimBougaoua\FilamentCountryStateCity\Resources\CityResource;
use IbrahimBougaoua\FilamentCountryStateCity\Resources\CountryResource;
use IbrahimBougaoua\FilamentCountryStateCity\Resources\StateResource;

class FilamentCountryStateCityPlugin implements Plugin
{
    public static function make(): static
    {
        return app(static::class);
    }

    public function getId(): string
    {
        return 'filament-country-state-city';
    }

    public function register(Panel $panel): void
    {
        $panel
            ->resources([
                CountryResource::class,
                StateResource::class,
                CityResource::class,
            ]);
    }

    public function boot(Panel $panel): void
    {
        //
    }
}
