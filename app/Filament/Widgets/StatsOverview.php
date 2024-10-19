<?php

namespace App\Filament\Widgets;

use App\Models\Guest;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected static ?string $pollingInterval = '60s';

    protected function getStats(): array
    {
        return [
            Stat::make('Total des personnes inscrites', $this->getTotal())
                ->description('Personnes')
                ->color('success'),
            Stat::make('Inscrits au souper', $this->getTotalSupper())
                ->description('ont très faim')
                ->color('success'),
            Stat::make('Inscrits pour dormir sur place', $this->getTotalSleep())
                ->description('sont des soiffards')
                ->color('success'),
        ];
    }

    public function getTotal(): string
    {
        return (string) Guest::query()->count();
    }

    public function getTotalSupper(): string
    {
        return (string) Guest::query()->where('supper', true)->count();
    }

    public function getTotalSleep(): string
    {
        return (string) Guest::query()->where('sleep', true)->count();
    }
}
