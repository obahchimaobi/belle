<?php

namespace App\Filament\Resources\ProductsResource\Pages;

use App\Filament\Resources\ProductsResource;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Set;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Str;

class CreateProducts extends CreateRecord
{
    protected static string $resource = ProductsResource::class;

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
                                                    ->afterStateUpdated(function (Set $set, ?string $state) {
                                                        $slug = Str::slug($state);
                                                        $prefix = 'PRD'; // Or dynamically from category, etc.
                                                        $shortName = strtoupper(substr(preg_replace('/[^A-Za-z0-9]/', '', $state), 0, 3));
                                                        $random = strtoupper(Str::random(4));
                                                        $sku = "{$prefix}-{$shortName}-{$random}";

                                                        $set('slug', $slug);
                                                        $set('sku', $sku);
                                                    }),
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
                                                        ->required(),
                                                    TextInput::make('original_price')
                                                        ->required(),
                                                    TextInput::make('discount_percentage')
                                                        ->label('Percentage Discount'),
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
                        // Grid::make([
                        //     'xl' => 3
                        // ])
                        // ->schema([
                        //     Section::make([
                        //         Section::make([
                        //             Grid::make([
                        //                 'xl' => 2
                        //             ])
                        //                 ->schema([
                        //                     TextInput::make('name'),
                        //                     TextInput::make('slug')
                        //                         ->dehydrated()
                        //                         ->disabled(),
                        //                     RichEditor::make('description')
                        //                         ->columnSpan(2),
                        //                 ]),
                        //         ]),
                        //     ]),
                        // ]),
                    ]),
            ]);
    }
}
