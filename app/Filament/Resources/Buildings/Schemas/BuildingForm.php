<?php

namespace App\Filament\Resources\Buildings\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class BuildingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nama Gedung')
                    ->unique()
                    ->maxLength(100)
                    ->autocomplete('off')
                    ->autofocus()
                    ->required(),

                TextInput::make('code')
                    ->label('Kode Gedung')
                    ->unique()
                    ->maxLength(100)
                    ->autocomplete('off')
                    ->required(),

                Textarea::make('description')
                    ->label('Deskripsi')
                    ->maxLength(255)
                    ->columnSpanFull(),
            ]);
    }
}
