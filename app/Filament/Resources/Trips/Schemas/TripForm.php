<?php

namespace App\Filament\Resources\Trips\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class TripForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('appointment_id')
                    ->relationship('appointment', 'id')
                    ->required(),
                Select::make('driver_id')
                    ->relationship('driver', 'id')
                    ->required(),
                Toggle::make('is_burrito')
                    ->required(),
                TextInput::make('pickup_location')
                    ->required(),
                TextInput::make('delivery_location')
                    ->required(),
                DateTimePicker::make('loading_eta'),
                DateTimePicker::make('delivery_eta'),
                TextInput::make('status')
                    ->required()
                    ->default('agendado'),
                TextInput::make('diesel_cost')
                    ->numeric()
                    ->prefix('$'),
                TextInput::make('diesel_liters')
                    ->numeric(),
                TextInput::make('kilometraje_start')
                    ->numeric(),
                TextInput::make('kilometraje_end')
                    ->numeric(),
                Textarea::make('notes')
                    ->columnSpanFull(),
            ]);
    }
}
