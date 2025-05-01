<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HalamanPublicResource\Pages;
use App\Models\HalamanPublic;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;

class HalamanPublicResource extends Resource
{
    protected static ?string $model = HalamanPublic::class;
    protected static ?string $navigationIcon = 'heroicon-o-qr-code';
    protected static ?string $navigationLabel = 'Manajemen QR Code Publik';
    protected static ?string $pluralLabel = 'QR Code Publik';
    protected static ?string $navigationGroup = 'Pemeliharaan Alat';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Select::make('alat_id')
                ->label('Pilih Alat')
                ->relationship('alat', 'alat_id')
                ->searchable()
                ->required()
                ->live(),

            TextInput::make('url_qrcode')
                ->label('URL Halaman Public (Auto)')
                ->disabled()
                ->helperText('Link ini otomatis dibuat setelah pilih alat'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('alat.alat_id')
                    ->label('ID Alat')
                    ->searchable(),

                TextColumn::make('url_qrcode')
                    ->label('URL Public')
                    ->copyable()
                    ->wrap()
                    ->formatStateUsing(function ($state) {
                        return '<a href="' . $state . '" target="_blank" class="text-primary underline">' . $state . '</a>';
                    })
                    ->html(),

                TextColumn::make('QR Code')
                    ->label('QR Code')
                    ->formatStateUsing(function ($record) {
                        $qrUrl = 'https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl=' . urlencode($record->url_qrcode);
                        return '<img class="qr-code-image" src="' . $qrUrl . '" width="80" id="qr-code-' . $record->id . '">';
                    })
                    ->html(),
            ])
            ->actions([
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function mutateFormDataBeforeCreate(array $data): array
    {
        if (!empty($data['alat_id'])) {
            $alatIds = HalamanPublic::pluck('alat_id')->toArray();
            $baseUrl = config('app.url');

            if (!in_array($data['alat_id'], $alatIds)) {
                $publicUrl = "{$baseUrl}/informasi-pemeliharaan-alat/{$data['alat_id']}";
                $data['url_qrcode'] = $publicUrl;
            } else {
                $data['url_qrcode'] = '';
            }
        }
        return $data;
    }

    public static function mutateFormDataBeforeSave(array $data): array
    {
        if (!empty($data['alat_id'])) {
            $baseUrl = config('app.url');
            $publicUrl = "{$baseUrl}/informasi-pemeliharaan-alat/{$data['alat_id']}";
            $data['url_qrcode'] = $publicUrl;
        }

        return $data;
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListHalamanPublics::route('/'),
            'create' => Pages\CreateHalamanPublic::route('/create'),
            'edit' => Pages\EditHalamanPublic::route('/{record}/edit'),
        ];
    }
}
