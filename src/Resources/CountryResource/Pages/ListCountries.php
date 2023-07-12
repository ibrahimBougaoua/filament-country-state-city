<?php

namespace IbrahimBougaoua\FilamentCountryStateCity\Resources\CountryResource\Pages;

use Filament\Pages\Actions\Action;
use IbrahimBougaoua\FilamentCountryStateCity\Resources\CountryResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCountries extends ListRecords
{
    protected static string $resource = CountryResource::class;

    protected function getActions(): array
    {
        return [
            Action::make('states')
                ->label('States')
                ->url(route('filament.resources.states.index'))
                ->color('success')
                ->icon('heroicon-o-map'),
            Action::make('cities')
                ->label('Cities')
                ->url(route('filament.resources.cities.index'))
                ->color('success')
                ->icon('heroicon-o-flag'),
            Actions\CreateAction::make(),
        ];
    }
}
