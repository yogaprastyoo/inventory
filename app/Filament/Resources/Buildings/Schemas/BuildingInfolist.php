<?php

namespace App\Filament\Resources\Buildings\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class BuildingInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('id')
                    ->label('ID'),
                TextEntry::make('name')
                    ->label('Nama Gedung'),
                TextEntry::make('code')
                    ->color('info')
                    ->badge()
                    ->label('Kode Gedung'),
                TextEntry::make('description')
                    ->label('Deskripsi')
                    ->placeholder('-'),
            ]);
    }
}
