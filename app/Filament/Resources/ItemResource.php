<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ItemResource\Pages;
use App\Models\Item;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ItemResource extends Resource
{
    protected static ?string $model = Item::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('format')
                    ->required()
                    ->label('Nombre del formato')
                    ->maxLength(255),
                Forms\Components\TextInput::make('observation')
                    ->required()
                    ->label('Observación')
                    ->maxLength(255),
                // Agregar el campo 'type' con valores predeterminados
                Forms\Components\Select::make('type')
                    ->required()
                    ->label('Tipo')
                    ->options([
                        'completo' => 'success',
                        'pendiente' => 'warning',
                        'observado' => 'danger',
                    ])
                    ->default('success') // Valor predeterminado si no se selecciona uno
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('format')
                    ->searchable()
                    ->label('Nombre Formato'),
                Tables\Columns\TextColumn::make('observation')
                    ->label('Observación'),
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
            'index' => Pages\ListItems::route('/'),
            'create' => Pages\CreateItem::route('/create'),
            'edit' => Pages\EditItem::route('/{record}/edit'),
        ];
    }
}
