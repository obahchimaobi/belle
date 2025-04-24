<?php

namespace App\Filament\Resources\ProductVariantsResource\Pages;

use App\Filament\Resources\ProductVariantsResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageProductVariants extends ManageRecords
{
    protected static string $resource = ProductVariantsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
