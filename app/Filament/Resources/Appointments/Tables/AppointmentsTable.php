<?php
//TODO ACTION GROUPS
namespace App\Filament\Resources\Appointments\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class AppointmentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('reference_number')
                    ->label('Referencia (factura)')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('client.nombre')
                    ->label('Cliente')
                    ->toggleable()
                    ->sortable()
                    ->searchable(),

                TextColumn::make('pickup_location')
                    ->toggleable()
                    ->label('Origen'),

                TextColumn::make('delivery_location')
                    ->toggleable()
                    ->label('Destino'),

                TextColumn::make('loading_eta')
                    ->label('ETA de Carga')
                    ->dateTime('d M Y h:i A')
                    ->toggleable()
                    ->sortable(),

                TextColumn::make('delivery_eta')
                    ->label('ETA de Descarga')
                    ->dateTime('d M Y h:i A')
                    ->toggleable()
                    ->sortable(),

                TextColumn::make('status')
                    ->label('Estatus')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {

                         'pendiente' => 'warning',
                         'confirmed' => 'info',
                         'loaded' => 'gray',
                         'shipped' => 'indigo',
                         'delivered' => 'success',
                         'cancelled' => 'danger',

                    })
                    ->icon(fn(string $state): string|null => match($state) {

                         'pendiente' => 'heroicon-m-clipboard-document',
                         'confirmed' => 'heroicon-m-clipboard-document-check',
                         'loaded' => 'heroicon-m-rectangle-stack',
                         'shipped' => 'heroicon-m-truck',
                         'delivered' => 'heroicon-m-check-badge',
                         'cancelled' => 'heroicon-m-x-circle',
                    })
                    ->toggleable()
                    ->sortable()
                    ,

               // TextColumn::make('gps')
               //     ->searchable(),
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
