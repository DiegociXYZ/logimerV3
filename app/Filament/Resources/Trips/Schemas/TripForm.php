<?php

namespace App\Filament\Resources\Trips\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use App\Enums\TripStatusEnum;

use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Components\Radio;
use Filament\Schemas\Components\Wizard;
use Filament\Schemas\Components\Wizard\Step;
use App\Models\Trip;
use Filament\Schemas\Components\Section;
class TripForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Part1')
                    ->description('Hola')
                    ->schema([
                        Select::make('appointment_id')
                            ->relationship('appointment', 'reference_number')
                            ->label('Numero de referencia')
                            ->searchable()
                            ->preload()
                            ->required(),
                        Select::make('driver_id')
                            ->label('Conductor')
                            ->relationship('driver','nombre')
                            ->required(),
                        Toggle::make('is_burrito')
                            ->label('Es burrito?')
                            ->required(),
                    ]),

                Section::make('Part2')
                    ->description('Hola2')
                    ->schema([
                        TextInput::make('pickup_location')
                            ->required(),

                        TextInput::make('delivery_location')
                            ->required(),
                        //Date Clusterfuck
                        DateTimePicker::make('loading_eta')
                            ->label('ETA de inicio')
                            ->seconds(false)
                            ->nullable()
                            ->native(false)
                            ->format('Y-m-d H:i:s')
                            ->displayFormat('d M Y H:i A')
                            ->placeholder(now()->startOfMonth()->format('d M Y H:i A'))
                            ->suffixIcon('heroicon-o-clock'),

                        DateTimePicker::make('delivery_eta')
                            ->label('ETA de llegada')
                            ->seconds(false)
                            ->nullable()
                            ->native(false)
                            ->format('Y-m-d H:i:s')
                            ->displayFormat('d M Y H:i A')
                            ->placeholder(now()->endOfMonth()->format('d M Y H:i A'))
                            ->suffixIcon('heroicon-o-clock'),

                        TextInput::make('status')
                            ->required()
                            ->default('agendado'),
                    ])->columns(2),

                Section::make('Part3')
                    ->description('hola3')
                    ->schema([

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
                    ])->columns(2),

               // Select::make('appointment_id')
               //     ->relationship('appointment', 'id')
               //     ->required(),
                //
               // Select::make('driver_id')
               //     ->relationship('driver', 'id')
               //     ->required(),
                //
               // Toggle::make('is_burrito')
               //     ->required(),
                //
               // TextInput::make('pickup_location')
               //     ->required(),
               // TextInput::make('delivery_location')
               //     ->required(),
                //
               // DateTimePicker::make('loading_eta'),
               // DateTimePicker::make('delivery_eta'),
                //
               // TextInput::make('status')
               //     ->required()
               //     ->default('agendado'),
                //
               // TextInput::make('diesel_cost')
               //     ->numeric()
               //     ->prefix('$'),
               // TextInput::make('diesel_liters')
               //     ->numeric(),
                //
               // TextInput::make('kilometraje_start')
               //     ->numeric(),
               // TextInput::make('kilometraje_end')
               //     ->numeric(),
                //
               // Textarea::make('notes')
               //     ->columnSpanFull(),
            ]);
    }
}
