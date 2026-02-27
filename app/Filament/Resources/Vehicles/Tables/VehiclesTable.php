<?php

namespace App\Filament\Resources\Vehicles\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class VehiclesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nombre')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('placa')
                    ->searchable(),
                TextColumn::make('tipo')
                    ->label('Tipo')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'camion' => 'info',
                        'remolque' => 'warning',
                        'dolly' => 'danger',
                    })
                    ->icon(fn(string $state): string => match ($state) {
                        'camion' => 'heroicon-m-truck',
                        'remolque' => 'heroicon-m-inbox',
                        'dolly' => 'heroicon-m-link',
                    })
                    ->toggleable()
                    ->searchable(),

                TextColumn::make('modelo')
                    ->toggleable()
                    ->searchable(),

                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'disponible' => 'success',
                        'no_disponible' => 'warning',
                        'mantenimiento' => 'secondary',
                    })
                    ->icon(fn (string $state): string|null => match($state) {
                        'disponible' => 'heroicon-o-check-circle',
                        'no_disponible' => 'heroicon-o-minus-circle',
                        'mantenimiento' => 'heroicon-o-wrench-screwdriver',
                    })
                    ->toggleable()
                    ->sortable(),

                IconColumn::make('is_rented')
                    ->label('Es rentado?')
                    ->sortable()
                    ->toggleable()
                    ->boolean(),
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
