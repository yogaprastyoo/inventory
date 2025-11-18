<?php

namespace App\Filament\Resources\Brands\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class BrandInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('id')
                    ->label('ID'),
                TextEntry::make('name')
                    ->label('Nama Merek'),
                TextEntry::make('description')
                    ->label('Deskripsi')
                    ->placeholder('-'),
            ]);
    }
}
