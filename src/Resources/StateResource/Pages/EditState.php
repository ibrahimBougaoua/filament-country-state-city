<?php

namespace IbrahimBougaoua\FilamentCountryStateCity\Resources\StateResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use IbrahimBougaoua\FilamentCountryStateCity\Resources\StateResource;

class EditState extends EditRecord
{
    protected static string $resource = StateResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
