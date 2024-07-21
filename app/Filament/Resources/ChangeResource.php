<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ChangeResource\Pages;
use App\Filament\Resources\ChangeResource\RelationManagers;
use App\Models\Change;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ChangeResource extends Resource
{
    protected static ?string $model = Change::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make([
                    'default' => 1,
                ])->columnSpan([
                    'lg' => 2,
                ])->schema([
                    Forms\Components\Section::make()
                        ->columns([
                            'default' => 1,
                            'lg' => 2,
                        ])
                        ->schema([
                            Forms\Components\TextInput::make('title')
                                ->required()
                                ->maxLength(120)
                                ->columnSpanFull(),

                            Forms\Components\RichEditor::make('body')
                                ->required()
                                ->toolbarButtons([
                                    'blockquote',
                                    'bold',
                                    'bulletList',
                                    'codeBlock',
                                    'h2',
                                    'h3',
                                    'italic',
                                    'link',
                                    'orderedList',
                                    'redo',
                                    'strike',
                                    'underline',
                                    'undo',
                                ])
                                ->columnSpanFull(),

                            // ...
                        ]),
                ]),

                Forms\Components\Grid::make(1)
                    ->columnSpan(1)
                    ->schema([
                        Forms\Components\Section::make()
                            ->schema([
                                Forms\Components\Placeholder::make('created_at')
                                    ->content(fn (?Change $record): string => $record ? $record->created_at->diffForHumans() : '-'),

                                Forms\Components\Placeholder::make('updated_at')
                                    ->content(fn (?Change $record): string => $record ? $record->updated_at->diffForHumans() : '-'),

                                Forms\Components\DateTimePicker::make('closed_at'),

                                // ...
                            ]),
                    ]),
            ])
            ->columns([
                'default' => 1,
                'lg' => 3,
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('closed_at')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: false),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListChanges::route('/'),
            'create' => Pages\CreateChange::route('/create'),
            'edit' => Pages\EditChange::route('/{record}/edit'),
        ];
    }
}
