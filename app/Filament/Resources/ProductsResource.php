<?php

namespace App\Filament\Resources;

use App\Models\Categories;
use Filament\Forms;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use App\Filament\Clusters\Products;
// use App\Models\Products;
use Filament\Infolists\Components\Grid;
use Filament\Infolists\Components\Split;
use Illuminate\Database\Eloquent\Builder;
use Filament\Infolists\Components\Section;
use Filament\Tables\Actions\RestoreAction;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Tables\Actions\ForceDeleteAction;
use Filament\Infolists\Components\Actions\Action;
use App\Filament\Resources\ProductsResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ProductsResource\RelationManagers;

class ProductsResource extends Resource
{
    // protected static ?string $model = Products::class;
    protected static ?string $cluster = Products::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';

    protected static ?string $activeNavigationIcon = 'heroicon-m-shopping-cart';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->maxLength(255),
                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->disk('public'),
                Forms\Components\TextInput::make('price')
                    ->numeric()
                    ->default(null)
                    ->prefix('$'),
                Forms\Components\TextInput::make('original_price')
                    ->numeric()
                    ->default(null),
                Forms\Components\TextInput::make('discount_percentage')
                    ->numeric()
                    ->default(null),
                Forms\Components\TextInput::make('label')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('rating')
                    ->numeric()
                    ->default(null),
                Forms\Components\TextInput::make('rating_count')
                    ->numeric()
                    ->default(0),
                Forms\Components\Toggle::make('status')
                    ->required(),
                Forms\Components\Textarea::make('description')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('sku')
                    ->label('SKU')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('stock_quantity')
                    ->numeric()
                    ->default(null),
                Forms\Components\Select::make('stock_status')
                    ->options([
                        'in_stock' => 'In Stock',
                        'out_of_stock' => 'Out Of Stock',
                        'pre_order' => 'Pre Order'
                    ]),
                Forms\Components\TextInput::make('category_id')
                    ->numeric()
                    ->default(null),
            ]);
    }


    public static function infolist(\Filament\Infolists\Infolist $infolist): \Filament\Infolists\Infolist
    {
        return $infolist
            ->schema([
                Section::make([
                    Grid::make([
                        'xl' => 3
                    ])
                        ->schema([
                            TextEntry::make('name'),
                            TextEntry::make('slug'),
                            ImageEntry::make('image')
                                ->circular()
                                ->label('')
                                ->alignEnd(),
                            TextEntry::make('created_at')
                                ->badge()
                                ->date()
                                ->color('success'),
                            TextEntry::make('category.name'),
                            TextEntry::make('brands.name'),
                            TextEntry::make('price')
                                ->money('NGN'),
                            TextEntry::make('original_price')
                                ->money('NGN'),
                            TextEntry::make('discount_percentage'),
                        ])
                ]),
                Section::make('Description')
                    ->collapsed()
                    ->headerActions([
                        Action::make('edit description')
                            ->form([
                                RichEditor::make('description')
                                    ->label('Description'),
                            ])
                            ->fillForm(function (\App\Models\Products $record): array {
                                return [
                                    'description' => $record->description,
                                ];
                            })
                            ->action(function (array $data, \App\Models\Products $record) {
                                $record->description = $data['description'];
                                str($record->description)->sanitizeHtml();
                                $record->save();

                                Notification::make()
                                    ->title('Saved Successfully')
                                    ->success()
                                    ->send();
                            })
                    ])
                    ->schema([
                        TextEntry::make('description')
                            ->label('')
                    ]),
                Section::make('Product Highlights')
                    ->collapsible()
                    ->schema([
                        Grid::make([
                            'xl' => 3
                        ])
                        ->schema([
                            TextEntry::make('label')
                                ->badge()
                                ->color(fn (string $state): string => match ($state) {
                                    'HOT' => 'danger',
                                    'NEW' => 'success',
                                    'SALE' => 'warning'
                                }),
                            TextEntry::make('rating'),
                            TextEntry::make('rating_count'),
                            TextEntry::make('sku'),
                            TextEntry::make('stock_quantity'),
                            TextEntry::make('stock_status')
                                ->badge()
                                ->color(fn (string $state): string => match ($state) {
                                    'In Stock' => 'success',
                                    'Out of Stock' => 'danger',
                                    'Pre Order' => 'warning'
                                }) ,
                        ]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image')
                    ->disk('public')
                    ->circular(),
                Tables\Columns\TextColumn::make('price')
                    ->money()
                    ->sortable(),
                Tables\Columns\TextColumn::make('original_price')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('discount_percentage')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('label')
                    ->searchable(),
                Tables\Columns\IconColumn::make('status')
                    ->boolean(),
                Tables\Columns\TextColumn::make('sku')
                    ->label('SKU')
                    ->searchable(),
                Tables\Columns\TextColumn::make('stock_quantity')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('stock_status'),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('category_id')
                    ->numeric()
                    ->sortable(),
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
                Tables\Actions\DeleteAction::make(),
                ForceDeleteAction::make(),
                RestoreAction::make()
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProducts::route('/create'),
            'view' => Pages\ViewProducts::route('/{record}'),
            'edit' => Pages\EditProducts::route('/{record}/edit'),
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
