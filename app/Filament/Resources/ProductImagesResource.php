<?php

namespace App\Filament\Resources;

use App\Filament\Clusters\Products;
use App\Filament\Resources\ProductImagesResource\Pages;
use App\Models\ProductImages;
use Filament\Forms;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductImagesResource extends Resource
{
    protected static ?string $model = ProductImages::class;

    protected static ?string $cluster = Products::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';

    protected static ?string $activeNavigationIcon = 'heroicon-m-photo';

    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('products_id')
                    ->required()
                    ->searchable()
                    ->relationship('products', 'name'),
                Forms\Components\FileUpload::make('image_path')
                    ->image(),
                Toggle::make('visible'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('products.name')
                    ->numeric()
                    ->label('Product Name')
                    ->sortable(),
                Tables\Columns\ImageColumn::make('image_path')
                    ->circular(),
                IconColumn::make('visible')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListProductImages::route('/'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
