<?php

namespace App\Filament\Resources\Rooms\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class RoomInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('id')
                    ->label('ID'),
                TextEntry::make('building.name')
                    ->label('Nama Gedung'),
                TextEntry::make('name')
                    ->label('Nama Ruangan'),
                TextEntry::make('code')
                    ->label('Kode Ruangan')
                    ->badge()
                    ->color('info'),
                TextEntry::make('description')
                    ->placeholder('-'),
            ])->columns(3);
    }
}
