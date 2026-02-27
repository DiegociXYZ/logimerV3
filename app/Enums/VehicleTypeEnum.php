<?php
namespace App\Enums;
use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum VehicleTypeEnum : string implements HasColor, HasIcon, HasLabel {
    case Camion = 'camion';
    case Remolque = 'remolque';
    case Dolly = 'dolly';

    public function getLabel():string {
        return match ($this){
           self::Camion => 'Camion',
           self::Remolque => 'Remolque',
           self::Dolly => 'Dolly'
        };
    }
    public function getColor(): string {
        return match ($this){
           self::Camion => 'info',
           self::Remolque => 'warning',
           self::Dolly => 'danger'
        };
    }

    public function getIcon(): string {
        return match ($this){
           self::Camion => 'heroicon-m-truck',
           self::Remolque => 'heroicon-m-inbox',
           self::Dolly => 'heroicon-m-link'
        };
    }
}
