<?php

namespace IbrahimBougaoua\FilamentCountryStateCity\Resources;

use IbrahimBougaoua\FilamentCountryStateCity\Resources\CityResource\Pages;
use IbrahimBougaoua\FilamentCountryStateCity\Models\City;
use IbrahimBougaoua\FilamentCountryStateCity\Models\State;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Str;

class CityResource extends Resource
{
    protected static ?string $model = City::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'Location';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\Card::make()
            ->schema([
                TextInput::make('name')->label('Name')->required()
                ->reactive()
                ->afterStateUpdated(function($state,callable $set){
                    $set('slug',Str::slug($state));
                })
                ->columnSpan([
                    'md' => 12,
                ]),
                TextInput::make('slug')->label('Slug')->required()
                ->disabled()
                ->columnSpan([
                    'md' => 12,
                ]),
                Select::make('state_id')->label('Country')
                ->reactive()
                ->required()
                ->options(State::all()->pluck('name','id')->toArray())->searchable()
                ->columnSpan([
                    'md' => 12,
                ]),
                Select::make('status')->label('Status')
                ->options([
                    '1' => 'Active',
                    '0' => 'Inactive',
                ])->default('1')->disablePlaceholderSelection()
                ->columnSpan([
                    'md' => 12,
                ]),
            ])
            ->columns([
                'md' => 10
            ])
            ->columnSpan('full'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Name')
                ->icon('heroicon-o-document-text')->sortable()->searchable(),
                TextColumn::make('slug')->label('Slug')->limit(20)->sortable()->searchable(),
                TextColumn::make('state.name')->label('Name')->limit(20)->sortable()->searchable(),
                IconColumn::make('status')
                ->label('Status')->boolean()
                ->trueIcon('heroicon-o-badge-check')
                ->falseIcon('heroicon-o-x-circle'),
                TextColumn::make('created_at')->label('Created at'),
            ])
            ->filters([
                SelectFilter::make('status')
                ->label('Status')->options([
                    '1' => 'Active',
                    '0' => 'Inactive',
                ]),
                Filter::make('created_at')
                ->label('Created at')->form([
                    Forms\Components\DatePicker::make('created_from')->label('Created from'),
                    Forms\Components\DatePicker::make('created_until')->label('Created until'),
                ])
                ->query(function (Builder $query, array $data): Builder {
                    return $query
                        ->when(
                            $data['created_from'],
                            fn (Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                        )
                        ->when(
                            $data['created_until'],
                            fn (Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                        );
                })
            ])
            ->actions([
                //Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                //]),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCities::route('/'),
        ];
    }    
}
