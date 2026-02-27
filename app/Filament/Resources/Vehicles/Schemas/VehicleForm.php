<?php

namespace App\Filament\Resources\Vehicles\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Filament\Forms\Components\ToggleButtons;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Select;
use App\Enums\VehicleStatusEnum;
use App\Enums\VehicleTypeEnum;
class VehicleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informacion del vehiculo')
                    ->schema([
                        TextInput::make('nombre')
                            ->required(),

                        TextInput::make('placa')
                            ->label('Placa')
                            ->unique(ignoreRecord: true)
                            ->required(),

                        ToggleButtons::make('tipo')
                            ->label('Tipo')
                            ->options(VehicleTypeEnum::class)
                            ->inline()
                            ->columnSpanFull()
                            ->required(),
                        TextInput::make('modelo')
                            ->label('Modelo'),
                    ])->columns(2),
                Section::make('Estado e informacion adicional')
                    ->schema([
                        ToggleButtons::make('status')
                            ->inline()
                            ->options(VehicleStatusEnum::class)
                            ->columnSpanFull()
                            ->required(),
                        Toggle::make('is_rented')
                            ->label('Es Rentado?')
                            ->required(),

                        Textarea::make('notes')
                            ->label('Notas')
                            ->columnSpanFull(),
                    ])->columns(2)

            ]);
    }
}
