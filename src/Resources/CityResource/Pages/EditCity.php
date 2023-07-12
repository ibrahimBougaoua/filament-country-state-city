<?php

namespace IbrahimBougaoua\FilamentCountryStateCity\Resources\CityResource\Pages;

use IbrahimBougaoua\FilamentCountryStateCity\Resources\CityResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCity extends EditRecord
{
    protected static string $resource = CityResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
