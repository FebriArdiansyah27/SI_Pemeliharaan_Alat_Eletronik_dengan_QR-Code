<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PemeliharaanResource\Pages;
use App\Models\Alat;
use App\Models\Pemeliharaan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;

class PemeliharaanResource extends Resource
{
    protected static ?string $model = Pemeliharaan::class;

    protected static ?string $navigationIcon = 'heroicon-o-wrench-screwdriver';

    protected static ?string $navigationLabel = 'Pemeliharaan Alat';
    protected static ?string $navigationGroup = 'Manajemen Pemeliharaan Alat';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('alat_id')
                    ->label('Pilih Alat')
                    ->options(Alat::all()->pluck('alat_id', 'alat_id')->toArray())
                    ->required(),

                DatePicker::make('tanggal')
                    ->label('Tanggal Pemeliharaan')
                    ->required(),

                Textarea::make('uraian_pemeliharaan')
                    ->label('Uraian Pemeliharaan')
                    ->required(),

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
                TextColumn::make('no')
                    ->label('No')
                    ->rowIndex(),
                TextColumn::make('alat.alat_id')
                    ->label('ID Alat')
                    ->searchable(),

                TextColumn::make('tanggal')
                    ->label('Tanggal'),

                TextColumn::make('uraian_pemeliharaan')
                    ->label('Uraian')
                    ->limit(30),

                TextColumn::make('kondisi')
                    ->label('Kondisi'),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->requiresConfirmation()
                    ->modalHeading('Konfirmasi Hapus')
                    ->modalSubheading('Yakin ingin menghapus data pemeliharaan ini?')
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

/*************  ✨ Windsurf Command ⭐  *************/
    /**
     * Get the pages for the Pemeliharaan resource.
     *
     * @return array An array of routes for listing, creating, and editing Pemeliharaan records.
     */

/*******  d823de6d-4a30-48d3-b9fb-14706873f604  *******/
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPemeliharaans::route('/'),
            'create' => Pages\CreatePemeliharaan::route('/create'),
            'edit' => Pages\EditPemeliharaan::route('/{record}/edit'),
        ];
    }
}
