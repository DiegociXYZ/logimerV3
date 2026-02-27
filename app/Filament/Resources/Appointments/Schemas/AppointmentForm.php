<?php

namespace App\Filament\Resources\Appointments\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use App\Enums\AppointmentStatusEnum;


//
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Components\Radio;
use Filament\Schemas\Components\Wizard;
use Filament\Schemas\Components\Wizard\Step;
use Filament\Forms\Components\Toggle;
use App\Models\Appointment;
use Filament\Schemas\Components\Section;
class AppointmentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Wizard::make([
                    Step::make('Envio')
                        ->schema([
                            //.......
                            Section::make("informacion General de la cita")
                                ->description("Datos basicos")
                                ->schema([
                                    TextInput::make('reference_number')
                                        ->label('Numero de referencia')
                                        ->nullable(),

                                    Select::make('client_id')
                                        ->relationship('client','nombre')
                                        ->required()
                                        ->label('Cliente')
                                        ->searchable()
                                        ->preload(),

                                    TextInput::make('pickup_location')
                                        ->label('Origen')
                                        ->nullable(),

                                    TextInput::make('delivery_location')
                                        ->label('Destino')
                                        ->nullable(),

                                    ToggleButtons::make('status')
                                        ->inline()
                                        ->options(AppointmentStatusEnum::class)
                                        ->default(AppointmentStatusEnum::Pendiente)
                                        ->required(),
                                ])
                            ->columns(2),

                        Section::make('Fechas y Tiempos Estimados')
                            ->description('Tiempos de carga y entrega.')
                                ->schema([
                                    //date Clusterfuck
                                    DateTimePicker::make('loading_eta')
                                        ->label('ETA de carga')
                                        ->seconds(false)
                                        ->nullable()
                                        ->native(false)
                                        ->format('Y-m-d H:i:s')
                                        ->displayFormat('d M Y H:i A')
                                        ->placeholder(now()->startOfMonth()->format('d M Y h:i A'))
                                        ->suffixIcon('heroicon-o-clock'),

                                    DateTimePicker::make('delivery_eta')
                                        ->label('ETA de descarga')
                                        ->seconds(false)
                                        ->nullable()
                                        ->native(false)
                                        ->format('Y-m-d H:i:s')
                                        ->displayFormat('d M Y H:i A')
                                        ->placeholder(now()->endOfMonth()->format('d M Y h:i A'))
                                        ->suffixIcon('heroicon-o-clock'),
                                ])
                            ->columns(2),
                            Section::make('Informacion Adicional')
                                ->schema([
                                    TextInput::make('gps')->nullable(),

                                    Textarea::make('notes')
                                        ->label('Notas')
                                        ->columnSpanFull(),
                                ])
                            ->columns(2),
                        ]),
                ])->columnSpanFull()

               // TextInput::make('reference_number'),
               // Select::make('client_id')
               //     ->relationship('client', 'id')
               //     ->required(),
               // TextInput::make('pickup_location')
               //     ->required(),
               // TextInput::make('delivery_location')
               //     ->required(),
               // DateTimePicker::make('loading_eta'),
               // DateTimePicker::make('delivery_eta'),
               // TextInput::make('status')
               //     ->required()
               //     ->default('pendiente'),
               // TextInput::make('gps'),
               // Textarea::make('notes')
               //     ->columnSpanFull(),
            ]);
    }
}
