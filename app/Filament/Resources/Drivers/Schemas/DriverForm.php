<?php

namespace App\Filament\Resources\Drivers\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class DriverForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informacion Personal')
                    ->schema([
                        TextInput::make('nombre')
                            ->label('Nombre')
                            ->required(),
                        TextInput::make('telefono')
                            ->label('Numero de telefono')
                            ->tel(),
                    ]),
                Section::make('Terceros')
                    ->description('Indica si es burrito')
                    ->schema([
                        Toggle::make('is_burrito')
                            ->label('Es burrito?')
                            ->required(),
                    ]),
            ]);
    }
}
