<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CetakAlatResource\Pages;
use App\Models\Alat;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class CetakAlatResource extends Resource
{
    protected static ?string $model = Alat::class;

    protected static ?string $navigationIcon = 'heroicon-o-printer';
    protected static ?string $pluralLabel = 'CetaK Alat';
    protected static ?string $navigationLabel = 'Cetak Alat';

    protected static ?string $navigationGroup = 'Manajemen Data Alat';

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
                TextColumn::make('alat_id')->label('ID Alat')->sortable()->searchable(),
                TextColumn::make('nama_alat')->label('Nama Alat')->sortable()->searchable(),
                TextColumn::make('lokasi')->label('Lokasi')->sortable()->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([

                Tables\Actions\Action::make('downloadPdf')
                    ->label('Download PDF')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->action(fn ($record) => redirect(route('cetak-alat.downloadPdf', ['alat_id' => $record->alat_id]))),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCetakAlats::route('/'),
        ];
    }

    public static function canViewAny(): bool
    {
        return auth('web')->check() && auth('web')->user()->role === 'admin';
    }

    public static function canView($record): bool
    {
        return auth('web')->check() && auth('web')->user()->role === 'admin';
    }

    public static function canCreate(): bool
    {
        return auth('web')->check() && auth('web')->user()->role === 'admin';
    }

    public static function canEdit($record): bool
    {
        return auth('web')->check() && auth('web')->user()->role === 'admin';
    }

    public static function canDelete($record): bool
    {
        return auth('web')->check() && auth('web')->user()->role === 'admin';
    }
}
