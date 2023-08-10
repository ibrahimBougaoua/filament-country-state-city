<?php

namespace IbrahimBougaoua\FilamentCountryStateCity\Resources\CityResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Actions\Action;
use IbrahimBougaoua\FilamentCountryStateCity\Resources\CityResource;

class ListCities extends ListRecords
{
    protected static string $resource = CityResource::class;

    protected function getActions(): array
    {
        return [
            //Action::make('countries')
            //    ->label('Countries')
            //    ->url(route('filament.resources.countries.index'))
            //    ->color('success')
            //    ->icon('heroicon-o-globe-alt'),
            //Action::make('states')
            //    ->label('States')
            //    ->url(route('filament.resources.states.index'))
            //    ->color('success')
            //    ->icon('heroicon-o-map'),
            Actions\CreateAction::make(),
        ];
    }
}
