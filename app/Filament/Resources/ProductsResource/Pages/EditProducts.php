<?php

namespace App\Filament\Resources\ProductsResource\Pages;

use App\Filament\Resources\ProductsResource;
use Filament\Actions;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Set;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Str;

class EditProducts extends EditRecord
{
    protected static string $resource = ProductsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }

    public function form(\Filament\Forms\Form $form): \Filament\Forms\Form
    {
        return $form
            ->schema([
                Grid::make([
                    'xl' => 1,
                ])
                    ->schema([
                        Split::make([
                            Grid::make([
                                'xl' => 1,
                            ])
                                ->schema([
                                    Section::make([
                                        Grid::make([
                                            'xl' => 2,
                                        ])
                                            ->schema([
                                                TextInput::make('name')
                                                    ->required()
                                                    ->live(onBlur: true)
                                                    ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state))),
                                                TextInput::make('slug')
                                                    ->dehydrated()
                                                    ->readOnly()
                                                    ->required(),
                                                RichEditor::make('description')
                                                    ->columnSpan(2),
                                            ]),
                                    ]),
                                    Section::make('Images')
                                        ->collapsible()
                                        ->schema([
                                            FileUpload::make('image')
                                                ->required()
                                                ->label('')
                                                ->disk('public')
                                                ->image()
                                                ->imageEditor(),
                                        ]),
                                    Section::make('Pricing')
                                        ->schema([
                                            Grid::make([
                                                'xl' => 2,
                                            ])
                                                ->schema([
                                                    TextInput::make('price')
                                                        ->required()
                                                        ->live(onBlur: true)
                                                        ->afterStateUpdated(fn($state, callable $set, callable $get) =>
                                                            static::calculateDiscount($get, $set)),

                                                    TextInput::make('original_price')
                                                        ->required()
                                                        ->live(onBlur: true)
                                                        ->afterStateUpdated(fn($state, callable $set, callable $get) =>
                                                            static::calculateDiscount($get, $set)),

                                                    TextInput::make('discount_percentage')
                                                        ->label('Percentage Discount')
                                                        ->readOnly(), // Make it non-editable since it's auto-calculated

                                                ]),
                                        ]),
                                    Section::make('Inventory')
                                        ->schema([
                                            Grid::make([
                                                'xl' => 2,
                                            ])
                                                ->schema([
                                                    TextInput::make('sku')
                                                        ->required(),
                                                    TextInput::make('stock_quantity')
                                                        ->label('Quantity')
                                                        ->required(),
                                                    Select::make('stock_status')
                                                        ->placeholder('')
                                                        ->required()
                                                        ->options([
                                                            'In Stock' => 'In Stock',
                                                            'Out of Stock' => 'Out of Stock',
                                                            'Pre Order' => 'Pre Order',
                                                        ]),
                                                ]),
                                        ]),
                                ])->grow(false),
                            Grid::make([
                                'xl' => 0,
                            ])
                                ->schema([
                                    Section::make('Status')
                                        ->schema([
                                            Toggle::make('status')
                                                ->label('Visible'),
                                        ]),
                                    Section::make('Associations')
                                        ->schema([
                                            Select::make('category_id')
                                                ->required()
                                                ->searchable()
                                                ->relationship(name: 'category', titleAttribute: 'name'),
                                            Select::make('brands_id')
                                                ->searchable()
                                                ->relationship(name: 'brands', titleAttribute: 'name'),
                                        ]),
                                    Section::make('')
                                        ->schema([
                                            Select::make('label')
                                                ->placeholder('')
                                                ->options([
                                                    'HOT' => 'Hot',
                                                    'NEW' => 'New',
                                                    'SALE' => 'Sale',
                                                ]),
                                            Select::make('category_type')
                                                ->options([
                                                    'Men' => 'Men',
                                                    'Women' => 'Women',
                                                ]),
                                        ]),
                                ]),
                        ])->from('md'),

                    ]),
            ]);
    }

    protected static function calculateDiscount($get, $set)
    {
        $price = (int) $get('price');
        $originalPrice = (int) $get('original_price');

        if ($originalPrice > 0 && $price > 0 && $price < $originalPrice) {
            $discount = (($originalPrice - $price) / $originalPrice) * 100;
            $set('discount_percentage', round($discount));
        } else {
            $set('discount_percentage', 0);
        }
    }

}
