<?php

namespace App\Filament\Resources\Trips\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class TripsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('appointment.id')
                    ->searchable(),
                TextColumn::make('driver.id')
                    ->searchable(),
                IconColumn::make('is_burrito')
                    ->boolean(),
                TextColumn::make('pickup_location')
                    ->searchable(),
                TextColumn::make('delivery_location')
                    ->searchable(),
                TextColumn::make('loading_eta')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('delivery_eta')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('status')
                    ->searchable(),
                TextColumn::make('diesel_cost')
                    ->money()
                    ->sortable(),
                TextColumn::make('diesel_liters')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('kilometraje_start')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('kilometraje_end')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
