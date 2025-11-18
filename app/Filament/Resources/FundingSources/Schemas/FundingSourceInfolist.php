<?php

namespace App\Filament\Resources\FundingSources\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class FundingSourceInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('id')
                    ->label('ID'),
                TextEntry::make('name')
                    ->label('Nama Sumber Dana'),
                TextEntry::make('description')
                    ->label('Deskripsi')
                    ->placeholder('-'),
            ]);
    }
}
