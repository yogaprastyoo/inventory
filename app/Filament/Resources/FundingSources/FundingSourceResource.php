<?php

namespace App\Filament\Resources\FundingSources;

use App\Filament\Resources\FundingSources\Pages\CreateFundingSource;
use App\Filament\Resources\FundingSources\Pages\EditFundingSource;
use App\Filament\Resources\FundingSources\Pages\ListFundingSources;
use App\Filament\Resources\FundingSources\Pages\ViewFundingSource;
use App\Filament\Resources\FundingSources\Schemas\FundingSourceForm;
use App\Filament\Resources\FundingSources\Schemas\FundingSourceInfolist;
use App\Filament\Resources\FundingSources\Tables\FundingSourcesTable;
use App\Models\FundingSource;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class FundingSourceResource extends Resource
{
    protected static ?string $model = FundingSource::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';
    protected static ?string $navigationLabel = 'Sumber Dana';
    protected static ?string $pluralLabel = 'Sumber Dana';
    protected static ?string $modelLabel = 'Sumber Dana';

    public static function form(Schema $schema): Schema
    {
        return FundingSourceForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return FundingSourceInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FundingSourcesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListFundingSources::route('/'),
            'view' => ViewFundingSource::route('/{record}'),
        ];
    }
}
