<?php

namespace App\Filament\Resources\BrandsResource\Pages;

use Filament\Actions;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use App\Filament\Resources\BrandsResource;
use Filament\Resources\Pages\CreateRecord;

class CreateBrands extends CreateRecord
{
    protected static string $resource = BrandsResource::class;

    public function form(\Filament\Forms\Form $form): \Filament\Forms\Form
    {
        return $form
            ->schema([
                Grid::make([
                    'xl' => 0,
                ])
                    ->schema([
                        Split::make([
                            Grid::make([
                                'xl' => 1
                            ])
                                ->schema([
                                    Section::make([
                                        Grid::make([
                                            'default' => 2,
                                            'xl' => 2
                                        ])
                                            ->schema([
                                                TextInput::make('name')
                                                    ->required(),
                                                TextInput::make('slug')
                                                    ->dehydrated()
                                                    ->disabled(),
                                                TextInput::make('website')
                                                    ->columnSpan(2),
                                                Toggle::make('visible')
                                                    ->label('Visible to customers')
                                                    ->columnSpan(2),
                                            ]),
                                    ]),
                                ])->grow(true),
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
