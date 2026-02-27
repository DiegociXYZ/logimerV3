<?php
namespace App\Enums;
use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum VehicleStatusEnum : string implements HasColor, HasIcon, HasLabel {
    case Disponible = 'disponible';
    case No_Disponible = 'no_disponible';
    case Mantenimiento = 'mantenimiento';

    public function getLabel():string {
        return match ($this){
           self::Disponible => 'Disponible',
           self::No_Disponible => 'No Disponible',
           self::Mantenimiento => 'Mantenimiento'
        };
    }
    public function getColor(): string {
        return match ($this){
           self::Disponible => 'success',
           self::No_Disponible => 'warning',
           self::Mantenimiento => 'secondary'
        };
    }

    public function getIcon(): string {
        return match ($this){
           self::Disponible => 'heroicon-o-check-circle',
           self::No_Disponible => 'heroicon-o-minus-circle',
           self::Mantenimiento => 'heroicon-o-wrench-screwdriver'
        };
    }
}
