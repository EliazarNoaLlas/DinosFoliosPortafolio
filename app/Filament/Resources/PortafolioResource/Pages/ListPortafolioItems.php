<?php

namespace App\Filament\Resources\PortafolioResource\Pages;

use Filament\Resources\Pages\ListRecords;
use Filament\Actions;
use App\Models\Portafolioitem;
use App\Models\Portafolio;
use Filament\Tables\Table;
use Filament\Tables;
use Filament\Tables\Columns;
use App\Filament\Resources\PortafolioitemResource;
use Illuminate\Database\Eloquent\Builder;

class ListPortafolioItems extends ListRecords
{
    protected static string $resource = PortafolioitemResource::class;

    // Añadimos una propiedad para almacenar el portafolio actual
    public Portafolio $portafolio;

    // Método mount compatible con la clase base
    public function mount(): void
    {
        parent::mount();

        // Obtenemos el registro del portafolio de la URL
        $this->portafolio = Portafolio::findOrFail(request()->route('record'));
    }

    // Sobrescribimos el método table para filtrar los ítems por portafolio
    public function table(Table $table): Table
    {
        return $table
            ->query(fn () => Portafolioitem::query()->where('portafolio_id', $this->portafolio->id))
            ->columns([
                Columns\TextColumn::make('item.format')
                    ->label('Nombre del Ítem')
                    ->searchable(),
//                Columns\TextColumn::make('item.observation')
//                    ->label('Descripción del Ítem')
//                    ->searchable(),
                Columns\TextColumn::make('item.observation')
                    ->label('Observación')
                    ->searchable(),
                Columns\TextColumn::make('item.type')
                    ->label('Estado')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'completo' => 'success',
                        'pendiente' => 'warning',
                        'observado' => 'danger',
                        default => 'gray',
                    }),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'completo' => 'Completo',
                        'observado' => 'Observado',
                        'pendiente' => 'Pendiente',
                    ])
                    ->label('Estado'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    protected function getHeaderActions(): array
    {
        return [
            // Modificamos la acción de crear para incluir el portafolio actual
            Actions\CreateAction::make()
                ->mutateFormDataUsing(function (array $data): array {
                    $data['portafolio_id'] = $this->portafolio->id;
                    return $data;
                }),
        ];
    }
}
