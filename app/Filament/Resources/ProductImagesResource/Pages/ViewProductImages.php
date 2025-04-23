<?php

namespace App\Filament\Resources\ProductImagesResource\Pages;

use App\Filament\Resources\ProductImagesResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewProductImages extends ViewRecord
{
    protected static string $resource = ProductImagesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
