<?php

namespace App\Filament\Widgets;

use App\Models\Transaction;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class WidgetPendapatanChart extends ChartWidget
{
    protected ?string $heading = 'Penghasilan';
    protected string $color = 'success';

    protected function getData(): array
    {
        $data = Trend::query(Transaction::Incomes())
        ->between(
            start: now()->startOfMonth(),
            end: now()->endOfMonth(),
        )
        ->perDay()
        ->sum('jumlah');

        return [
            'datasets' => [
                [
                    'label' => 'Penghasilan Harian',
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                ],
            ],
            'labels' => $data->map(fn (TrendValue $value) => $value->date),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
