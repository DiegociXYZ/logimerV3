<?php

namespace App\Filament\Widgets;

use Guava\Calendar\Filament\CalendarWidget;
use Guava\Calendar\ValueObjects\FetchInfo;
use Illuminate\Support\Collection;

class MyCalendarWidget extends CalendarWidget
{
    /**
     * This method is abstract in the parent class,
     * so you MUST define it here.
     */
    protected function getEvents(FetchInfo $info): Collection | array
    {
        // For now, we return an empty array so the error goes away.
        return [];
    }
}
