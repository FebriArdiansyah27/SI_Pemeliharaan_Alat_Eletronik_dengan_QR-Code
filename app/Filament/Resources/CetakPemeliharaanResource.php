<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CetakPemeliharaanResource\Pages;
use App\Models\Pemeliharaan;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class CetakPemeliharaanResource extends Resource
{
    protected static ?string $model = Pemeliharaan::class;

    protected static ?string $navigationIcon = 'heroicon-o-printer';
    protected static ?string $pluralLabel = 'Cetak Pemeliharaan';
    protected static ?string $navigationLabel = 'Cetak Pemeliharaan';

    protected static ?string $navigationGroup = 'Manajemen Pemeliharaan Alat';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('no')
                    ->label('No')
                    ->rowIndex(),
                TextColumn::make('alat.alat_id')->label('ID Alat')->sortable()->searchable(),
                TextColumn::make('tanggal')->label('Tanggal')->sortable()->searchable(),
                TextColumn::make('uraian_pemeliharaan')->label('Uraian')->limit(30),
                TextColumn::make('kondisi')->label('Kondisi Setelah'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\Action::make('print')
                    ->label('Preview')
                    ->icon('heroicon-o-printer')
                    ->action(fn ($record) => redirect(route('cetak-pemeliharaan.print', ['pemeliharaan_id' => $record->id]))),
                Tables\Actions\Action::make('downloadPdf')
                    ->label('Download PDF')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->action(fn ($record) => redirect(route('cetak-pemeliharaan.downloadPdf', ['pemeliharaan_id' => $record->id]))),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCetakPemeliharaans::route('/'),
        ];
    }
}
