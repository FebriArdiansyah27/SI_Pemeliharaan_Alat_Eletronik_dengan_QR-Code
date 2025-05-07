<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HalamanPublicResource\Pages;
use App\Models\HalamanPublic;
use App\Models\Alat;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Notifications\Notification;
use Filament\Tables\Actions\EditAction;

class HalamanPublicResource extends Resource
{
    protected static ?string $model = HalamanPublic::class;
    protected static ?string $navigationIcon = 'heroicon-o-qr-code';
    protected static ?string $navigationLabel = 'Manajemen QR Code Publik';
    protected static ?string $pluralLabel = 'Manajemen QR Code Publik';
    protected static ?string $navigationGroup = 'Manajemen Halaman Public';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Select::make('alat_id')
                ->label('Pilih Alat')
                ->relationship('alat', 'alat_id')
                ->searchable()
                ->required()
                ->unique(ignoreRecord: true)
                ->live()
                ->afterStateUpdated(function (callable $set, $state) {
                    if ($state) {
                        $baseUrl = config('app.url');
                        $publicUrl = "{$baseUrl}/informasi-pemeliharaan-alat/{$state}";
                        $set('url_qrcode', $publicUrl);
                    } else {
                        $set('url_qrcode', null);
                    }
                }),

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
                TextColumn::make('no')->label('No')->rowIndex(),

                TextColumn::make('alat.alat_id')
                    ->label('ID Alat')
                    ->searchable(),

                TextColumn::make('url_qrcode')
                    ->label('URL Public')
                    ->copyable()
                    ->wrap()
                    ->formatStateUsing(function ($state) {
                        return is_string($state)
                            ? '<a href="' . $state . '" target="_blank" class="underline text-primary">' . $state . '</a>'
                            : '';
                    })
                    ->html(),

                TextColumn::make('qr_code')
                    ->label('QR Code')
                    ->formatStateUsing(function ($state) {
                        return $state
                            ? '<img src="' . asset('storage/' . $state) . '" width="100" height="100" alt="QR Code">'
                            : '';
                    })
                    ->html(),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),

                Action::make('generateQr')
                    ->label('Generate QR')
                    ->action(function (HalamanPublic $record, Action $action) {
                        $record->generateQrCode();
                        Notification::make()
                            ->title('QR Code berhasil dibuat')
                            ->success()
                            ->send();
                    })
                    ->requiresConfirmation()
                    ->color('success'),
            ])
            ->bulkActions([
                DeleteBulkAction::make(),
            ]);
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
            'printQrCode' => Pages\PrintQrCode::route('/print-qr-code/{record}'),
            'printQrCodeDuplicate' => Pages\PrintQrCodeDuplicate::route('/print-qr-code-duplicate/{record}'),
        ];
    }

    // === Hak akses (HANYA ADMIN) ===

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
