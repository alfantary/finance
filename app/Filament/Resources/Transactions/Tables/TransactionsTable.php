<?php

namespace App\Filament\Resources\Transactions\Tables;

use App\Models\Transaction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class TransactionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('category.name')
                    ->description(fn (Transaction $record): string => $record->uraian)
                    ->label('Transaksi')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('tanggal')
                    ->date()
                    ->sortable(),
                TextColumn::make('jumlah')
                    ->numeric()
                    ->sortable()
                    ->money('IDR', locale:'id', decimalPlaces: 0),
                // TextColumn::make('uraian')
                //     ->searchable(),
                // ImageColumn::make('image'),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                IconColumn::make('category.is_expanse')
                    ->label('D/C')
                    ->boolean()
                    ->trueIcon('heroicon-c-arrow-trending-down')
                    ->falseIcon('heroicon-c-arrow-trending-up')
                    ->trueColor('danger')
                    ->falseColor('info'),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
