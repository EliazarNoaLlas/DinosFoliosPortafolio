<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PortafolioitemResource\Pages;
use App\Filament\Resources\PortafolioitemResource\RelationManagers;
use App\Models\Portafolioitem;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PortafolioitemResource extends Resource
{
    protected static ?string $model = Portafolioitem::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('portafolio_id')
                    ->relationship('portafolio', 'status')
                    ->searchable()
                    ->preload()
                    ->label('Estado del Portafolio')
                    ->required(),
                Forms\Components\Select::make('item_id')
                    ->relationship('item', 'observation')
                    ->searchable()
                    ->preload()
                    ->label('Observación del ítem')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('portafolio.user.name')
                    ->searchable()
                    ->label('User'),
                Tables\Columns\TextColumn::make('portafolio.curso.name')
                    ->searchable()
                    ->label('Curso'),
                Tables\Columns\TextColumn::make('portafolio.status')
                    ->searchable()
                    ->label('Estado Portafolio'),
                Tables\Columns\TextColumn::make('item.observation')
                    ->searchable()
                    ->label('Observación'),
                Tables\Columns\TextColumn::make('portafolio.user.name')
                    ->searchable()
                    ->label('User'),

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
            'index' => Pages\ListPortafolioitems::route('/items'),
            'create' => Pages\CreatePortafolioitem::route('/create'),
            'edit' => Pages\EditPortafolioitem::route('/{record}/edit'),
        ];
    }
}
