<?php

namespace IbrahimBougaoua\FilamentCountryStateCity\Resources\StateResource\Pages;

use Filament\Pages\Actions;
use Filament\Pages\Actions\Action;
use Filament\Resources\Pages\ListRecords;
use IbrahimBougaoua\FilamentCountryStateCity\Resources\StateResource;

class ListStates extends ListRecords
{
    protected static string $resource = StateResource::class;

    protected function getActions(): array
    {
        return [
            Action::make('countries')
                ->label('Countries')
                ->url(route('filament.resources.countries.index'))
                ->color('success')
                ->icon('heroicon-o-globe-alt'),
            Action::make('cities')
                ->label('Cities')
                ->url(route('filament.resources.cities.index'))
                ->color('success')
                ->icon('heroicon-o-flag'),
            Actions\CreateAction::make(),
        ];
    }
}
