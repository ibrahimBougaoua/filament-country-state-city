<?php

namespace IbrahimBougaoua\FilamentCountryStateCity\Resources;

use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use IbrahimBougaoua\FilamentCountryStateCity\Models\Country;
use IbrahimBougaoua\FilamentCountryStateCity\Models\State;
use IbrahimBougaoua\FilamentCountryStateCity\Resources\StateResource\Pages;
use Illuminate\Database\Eloquent\Builder;
use Str;

class StateResource extends Resource
{
    protected static ?string $model = State::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Location';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                        TextInput::make('name')->label('Name')->required()
                            ->reactive()
                            ->afterStateUpdated(function ($state, callable $set) {
                                $set('slug', Str::slug($state));
                            })
                            ->columnSpan([
                                'md' => 12,
                            ]),
                        TextInput::make('slug')->label('Slug')->required()
                            ->disabled()
                            ->columnSpan([
                                'md' => 12,
                            ]),
                        Select::make('country_id')->label('Country')
                            ->reactive()
                            ->required()
                            ->options(Country::all()->pluck('name', 'id')->toArray())->searchable()
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
                        'md' => 10,
                    ])
                    ->columnSpan('full'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Name')
                    ->icon('heroicon-o-rectangle-stack')->sortable()->searchable(),
                TextColumn::make('slug')->label('Slug')->limit(20)->sortable()->searchable(),
                TextColumn::make('country.name')->label('Country')->sortable()->searchable(),
                TextColumn::make('cities_count')->counts('cities'),
                IconColumn::make('status')
                    ->label('Status')->boolean()
                    ->trueIcon('heroicon-o-rectangle-stack')
                    ->falseIcon('heroicon-o-rectangle-stack'),
                TextColumn::make('created_at')->label('Created at'),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->label('Status')->options([
                    '1' => 'Active',
                    '0' => 'Inactive',
                ]),
                Filter::make('created_at')
                    ->label(__('panel.created_at'))->form([
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
                    }),
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
            'index' => Pages\ListStates::route('/'),
        ];
    }
}
