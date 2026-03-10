<?php

namespace App\Filament\Widgets;

use App\Models\Transaction;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $pemasukan=Transaction::incomes()->get()->sum('jumlah');
        $pengeluaran=Transaction::expanses()->get()->sum('jumlah');
        return [
            Stat::make('Total Pemasukan', $pemasukan),
            Stat::make('Total Pengeluaran', $pengeluaran),
            Stat::make('Plus/Minus', $pemasukan - $pengeluaran),
        ];
    }
}
