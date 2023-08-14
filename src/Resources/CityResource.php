<?php

namespace IbrahimBougaoua\FilamentCountryStateCity\Resources;

use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
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

    protected static ?string $navigationIcon = 'icon-city';

    public static function getLabel(): ?string
    {
        return __('location.cities');
    }

    public static function getPluralLabel(): ?string
    {
        return __('location.cities');
    }

    public static function getNavigationLabel(): string
    {
        return __('location.cities');
    }

    public static function getNavigationGroup(): string
    {
        return __('location.location');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        TextInput::make('name')
                        ->label(__('location.name'))
                        ->required()
                        ->reactive()
                        ->afterStateUpdated(function ($state, callable $set) {
                            $set('slug', Str::slug($state));
                        })
                        ->columnSpan([
                            'md' => 12,
                        ]),
                        TextInput::make('slug')
                        ->label(__('location.slug'))
                        ->required()
                            ->disabled()
                            ->columnSpan([
                                'md' => 12,
                            ]),
                        Select::make('state_id')
                        ->label(__('location.state'))
                            ->reactive()
                            ->required()
                            ->options(State::all()->pluck('name', 'id')->toArray())->searchable()
                            ->columnSpan([
                                'md' => 12,
                            ]),
                        Select::make('status')
                        ->label(__('location.status'))
                            ->options([
                                '1' => __('location.active'),
                                '0' => __('location.inactive'),
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
                TextColumn::make('name')
                ->label(__('location.name'))
                ->icon('heroicon-o-rectangle-stack')
                ->sortable()
                ->searchable(),
                TextColumn::make('slug')
                ->label(__('location.slug'))
                ->limit(20)
                ->sortable()
                ->searchable(),
                TextColumn::make('state.name')
                ->label(__('location.state_name'))
                ->limit(20)
                ->sortable()
                ->searchable(),
                IconColumn::make('status')
                ->label(__('location.status'))
                ->boolean()
                ->trueIcon('heroicon-o-rectangle-stack')
                ->falseIcon('heroicon-o-rectangle-stack'),
                TextColumn::make('created_at')->label(__('location.created_at')),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->label(__('location.status'))->options([
                    '1' => __('location.active'),
                    '0' => __('location.inactive'),
                ]),
                Filter::make('created_at')
                    ->label('created_at')->form([
                    Forms\Components\DatePicker::make('created_from')->label(__('location.created_from')),
                    Forms\Components\DatePicker::make('created_until')->label(__('location.created_until')),
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
