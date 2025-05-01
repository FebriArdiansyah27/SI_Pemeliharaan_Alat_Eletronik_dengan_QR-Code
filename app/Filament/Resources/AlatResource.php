<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AlatResource\Pages;
use App\Models\Alat;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;

class AlatResource extends Resource
{
    protected static ?string $model = Alat::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Manajemen Alat';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('alat_id')
                    ->label('ID Alat')
                    ->required()
                    ->maxLength(20)
                    ->unique(ignoreRecord: true), // Hindari duplikasi ID saat edit/create

                TextInput::make('nama_alat')
                    ->label('Nama Alat')
                    ->required()
                    ->maxLength(225),

                TextInput::make('lokasi')
                    ->label('Lokasi')
                    ->required()
                    ->maxLength(225),

                TextInput::make('kondisi')
                    ->label('Kondisi')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('alat_id')->label('ID Alat')->sortable()->searchable(),
                TextColumn::make('nama_alat')->label('Nama Alat')->sortable()->searchable(),
                TextColumn::make('lokasi')->label('Lokasi')->sortable()->searchable(),
                TextColumn::make('kondisi')->label('Kondisi')->sortable()->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
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
}
