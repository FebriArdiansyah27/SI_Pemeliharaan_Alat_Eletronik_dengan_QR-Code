<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AlatResource\Pages;
use App\Models\Alat;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;

class AlatResource extends Resource
{
    protected static ?string $model = Alat::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $pluralLabel = 'Manajemen Data Alat';
    protected static ?string $navigationLabel = 'Manajemen Alat';
    protected static ?string $navigationGroup = 'Manajemen Data Alat';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('alat_id')
                ->label('ID Alat')
                ->required()
                ->maxLength(20)
                ->unique(ignoreRecord: true),

            TextInput::make('nama_alat')
                ->label('Nama Alat')
                ->required()
                ->maxLength(225),

            TextInput::make('lokasi')
                ->label('Lokasi')
                ->required()
                ->maxLength(225),

            Select::make('kondisi')
                ->label('Kondisi Setelah Pemeliharaan')
                ->options([
                    'baik' => 'Baik',
                    'rusak' => 'Rusak',
                    'dipelihara' => 'Dipelihara',
                ])
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('no')->label('No')->rowIndex(),
                TextColumn::make('alat_id')->label('ID Alat')->sortable()->searchable(),
                TextColumn::make('nama_alat')->label('Nama Alat')->sortable()->searchable(),
                TextColumn::make('lokasi')->label('Lokasi')->sortable()->searchable(),
                TextColumn::make('kondisi')->label('Kondisi')->sortable()->searchable(),
            ])
            ->actions([
                Tables\Actions\EditAction::make()->color('primary'),
                Tables\Actions\DeleteAction::make()->color('danger')
                    ->requiresConfirmation()
                    ->modalHeading('Konfirmasi Hapus')
                    ->modalSubheading('Apakah Anda yakin ingin menghapus data ini?')
                    ->modalButton('Hapus'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAlats::route('/'),
            'create' => Pages\CreateAlat::route('/create'),
            'edit' => Pages\EditAlat::route('/{record}/edit'),
        ];
    }

    // === Hak akses ===

    public static function canViewAny(): bool
    {
        return auth('web')->check();
    }

    public static function canView($record): bool
    {
        return auth('web')->check();
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
