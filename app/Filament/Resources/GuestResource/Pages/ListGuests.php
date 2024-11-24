<?php

namespace App\Filament\Resources\GuestResource\Pages;

use App\Filament\Resources\GuestResource;
use App\Filament\Widgets\StatsOverview;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGuests extends ListRecords
{
    protected static string $resource = GuestResource::class;

    protected function getHeaderWidgets(): array
    {
        return [
            StatsOverview::class,
        ];
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
