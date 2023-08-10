<?php

namespace IbrahimBougaoua\FilamentCountryStateCity\Resources\CountryResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use IbrahimBougaoua\FilamentCountryStateCity\Resources\CountryResource;

class ListCountries extends ListRecords
{
    protected static string $resource = CountryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
