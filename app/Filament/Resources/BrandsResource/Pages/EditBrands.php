<?php

namespace App\Filament\Resources\BrandsResource\Pages;

use Filament\Actions;
use Filament\Forms\Set;
use Illuminate\Support\Str;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\BrandsResource;
use Filament\Forms\Components\DateTimePicker;

class EditBrands extends EditRecord
{
    protected static string $resource = BrandsResource::class;

    protected function getHeaderActions(): array
    {
        return [
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
                    'xl' => 0
                ])
                ->schema([
                    Split::make([
                        Grid::make([
                            'xl' => 1
                        ])
                        ->schema([
                            Section::make([
                                Grid::make([
                                    'xl' => 2
                                ])
                                ->schema([
                                    TextInput::make('name')
                                        ->live(onBlur: true)                                                    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state)))
                                        ->required(),
                                    TextInput::make('slug')
                                        ->readOnly(),
                                    TextInput::make('website')
                                        ->columnSpan(2),
                                    Toggle::make('visible')
                                        ->columnSpan(2),
                                ]),
                            ]),
                        ])->grow(false),
                        Grid::make([
                            'xl' => 1
                        ])
                        ->schema([
                            Section::make([
                                Grid::make([
                                    'xl' => 0
                                ])
                                ->schema([
                                    DateTimePicker::make('created_at')
                                        ->disabled(),
                                    DateTimePicker::make('updated_at')
                                        ->label('Last modified at')
                                        ->disabled(),
                                ]),
                            ]),
                        ]),
                    ])->from('md')
                ]),
            ]);
    }
}
