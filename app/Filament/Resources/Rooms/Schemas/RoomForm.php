<?php

namespace App\Filament\Resources\Rooms\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class RoomForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('building_id')
                    ->label('Nama Gedung')
                    ->relationship('building', 'name')
                    ->preload()
                    ->searchable()
                    ->createOptionForm(function (Schema $schema) {
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
                                    ->label('Kode')
                                    ->unique()
                                    ->maxLength(100)
                                    ->autocomplete('off')
                                    ->required(),

                                Textarea::make('description')
                                    ->label('Deskripsi')
                                    ->maxLength(255)
                                    ->columnSpanFull(),
                            ])
                            ->columns([
                                'sm' => 1,
                                'md' => 2,
                                'lg' => 2,
                            ]);
                    })
                    ->createOptionAction(function ($action) {
                        return $action
                            ->modalHeading('Tambah Gedung Baru')
                            ->modalSubmitActionLabel('Tambah');
                    })
                    ->required(),
                TextInput::make('name')
                    ->label('Nama Ruangan')
                    ->maxLength(100)
                    ->autocomplete('off')
                    ->required(),
                TextInput::make('code')
                    ->label('Kode Ruangan')
                    ->unique()
                    ->maxLength(100)
                    ->autocomplete('off')
                    ->required(),
                Textarea::make('description')
                    ->label('Deskripsi')
                    ->maxLength(255)
                    ->autocomplete('off')
                    ->columnSpanFull(),
            ])->columns([
                'sm' => 1,
                'md' => 3,
                'lg' => 3,
            ]);
    }
}
