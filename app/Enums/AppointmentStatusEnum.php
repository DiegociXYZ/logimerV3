<?php
namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum AppointmentStatusEnum: string implements HasColor, HasIcon, HasLabel
{
    case Pendiente = 'pendiente';
    case Confirmed = 'confirmed';
    case Loaded = 'loaded';
    case Shipped = 'shipped';
    case Delivered = 'delivered';
    case Cancelled = 'cancelled';

    public function getLabel(): string
    {
        return match ($this){
            self::Pendiente =>'Pendiente',
            self::Confirmed => 'Confirmado',
            self::Loaded => 'Cargado',
            self::Shipped => 'En Transito',
            self::Delivered =>'Entregado',
            self::Cancelled => 'Cancelado',
        };
    }
    public function getColor(): string {
        return match ($this){

            self::Pendiente =>'warning',
            self::Confirmed => 'info',
            self::Loaded => 'gray',
            self::Shipped => 'indigo',
            self::Delivered =>'success',
            self::Cancelled => 'danger',
        };
    }
    public function getIcon(): string {
        return match ($this) {
            self::Pendiente =>'heroicon-m-clipboard-document',
            self::Confirmed => 'heroicon-m-clipboard-document-check',
            self::Loaded => 'heroicon-m-rectangle-stack',
            self::Shipped => 'heroicon-m-truck',
            self::Delivered =>'heroicon-m-check-badge',
            self::Cancelled => 'heroicon-m-x-circle',
        };
    }
}
