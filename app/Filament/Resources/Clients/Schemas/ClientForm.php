<?php

namespace App\Filament\Resources\Clients\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ClientForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informacion del CLiente')
                    ->description('Detalles principales del cliente.')
                    ->schema([
                        TextInput::make('nombre')
                            ->label('Cliente')
                            ->required(),
                        TextInput::make('telefono')
                            ->label('Numero de Telefono')
                            ->tel(),
                    ])
            ]);
    }
}
