<?php

namespace App\Filament\Resources\FundingSources\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class FundingSourceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nama Sumber Dana')
                    ->unique()
                    ->maxLength(100)
                    ->autocomplete('off')
                    ->required()
                    ->columnSpanFull(),

                Textarea::make('description')
                    ->label('Deskripsi')
                    ->maxLength(255)
                    ->columnSpanFull(),
            ]);
    }
}
