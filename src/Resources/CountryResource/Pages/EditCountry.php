<?php

namespace IbrahimBougaoua\FilamentCountryStateCity\Resources\CountryResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use IbrahimBougaoua\FilamentCountryStateCity\Resources\CountryResource;

class EditCountry extends EditRecord
{
    protected static string $resource = CountryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
