<?php

namespace IbrahimBougaoua\FilamentCountryStateCity\Resources\CityResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use IbrahimBougaoua\FilamentCountryStateCity\Resources\CityResource;

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
