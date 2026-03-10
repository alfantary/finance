<?php

namespace App\Filament\Resources\Transactions\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class TransactionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('category_id')
                    ->relationship('category', 'name')
                    ->required(),
                DatePicker::make('tanggal')
                    ->required(),
                TextInput::make('jumlah')
                    ->required()
                    ->numeric(),
                TextInput::make('uraian')
                    ->required(),
                FileUpload::make('image')
                    ->image()
                    ->required(),
            ]);
    }
}
