<?php

namespace IbrahimBougaoua\FilamentCountryStateCity\Resources;

use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use IbrahimBougaoua\FilamentCountryStateCity\Models\City;
use IbrahimBougaoua\FilamentCountryStateCity\Models\State;
use IbrahimBougaoua\FilamentCountryStateCity\Resources\CityResource\Pages;
use Illuminate\Database\Eloquent\Builder;
use Str;

class CityResource extends Resource
{
    protected static ?string $model = City::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Location';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        Tabs::make('names')
                        ->tabs([
                            Tabs\Tab::make('name_en')
                                ->label(__('panel.name_en'))
                                ->schema([
                                    TextInput::make('name')
                                    ->reactive()
                                    ->afterStateUpdated(function ($state, callable $set) {
                                        $set('slug', Str::slug($state));
                                    })
                                    ->label(__('panel.name_en'))
                                    ->columnSpan([
                                        'md' => 12,
                                    ])
                                ]),
                            Tabs\Tab::make('name_fr')
                                ->label(__('panel.name_fr'))
                                ->schema([
                                    TextInput::make('name_fr')
                                    ->label(__('panel.name_fr'))
                                    ->columnSpan([
                                        'md' => 12,
                                    ])
                                ]),
                            Tabs\Tab::make('name_ar')
                                ->label(__('panel.name_ar'))
                                ->schema([
                                    TextInput::make('name_ar')
                                    ->label(__('panel.name_ar'))
                                    ->columnSpan([
                                        'md' => 12,
                                    ])
                                ]),
                        ])
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
                            ->options(State::all()->pluck('name', 'id')->toArray())->searchable()
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
                TextColumn::make('state.name')->label('Name')->limit(20)->sortable()->searchable(),
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
            'index' => Pages\ListCities::route('/'),
        ];
    }
}
