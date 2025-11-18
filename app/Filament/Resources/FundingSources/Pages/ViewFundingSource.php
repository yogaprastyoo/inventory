<?php

namespace App\Filament\Resources\FundingSources\Pages;

use App\Filament\Resources\FundingSources\FundingSourceResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewFundingSource extends ViewRecord
{
    protected static string $resource = FundingSourceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
