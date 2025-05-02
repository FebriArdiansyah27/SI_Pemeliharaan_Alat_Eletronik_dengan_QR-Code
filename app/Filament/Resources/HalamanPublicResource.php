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
use SimpleSoftwareIO\QRCode\Facades\QRCode;

class HalamanPublicResource extends Resource
{
    protected static ?string $model = HalamanPublic::class;
    protected static ?string $navigationIcon = 'heroicon-o-qr-code';
    protected static ?string $navigationLabel = 'Manajemen QR Code Publik';
    protected static ?string $pluralLabel = 'QR Code Publik';
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
                TextColumn::make('alat.alat_id')
                    ->label('ID Alat')
                    ->searchable(),

                TextColumn::make('url_qrcode')
                    ->label('URL Public')
                    ->copyable()
                    ->wrap()
                    ->formatStateUsing(function ($state) {
                        return is_string($state)
                            ? '<a href="' . $state . '" target="_blank" class="text-primary underline">' . $state . '</a>'
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
    Tables\Actions\DeleteAction::make(),
    Tables\Actions\Action::make('generateQr')
        ->label('Generate QR')
        ->action(function (HalamanPublic $record, Tables\Actions\Action $action) {
            $record->generateQrCode();
            $action->success();
        })
        ->requiresConfirmation()
        ->color('success'),
])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function mutateFormDataBeforeCreate(array $data): array
    {
        if (!empty($data['alat_id'])) {
            $baseUrl = config('app.url');
            $publicUrl = "{$baseUrl}/informasi-pemeliharaan-alat/{$data['alat_id']}";
            $data['url_qrcode'] = $publicUrl;

            $qrImage = QRCode::format('png')->size(200)->generate($publicUrl);
            $data['qr_code_image'] = base64_encode($qrImage);
        }

        return $data;
    }

    public static function mutateFormDataBeforeSave(array $data): array
    {
        if (!empty($data['alat_id'])) {
            $baseUrl = config('app.url');
            $publicUrl = "{$baseUrl}/informasi-pemeliharaan-alat/{$data['alat_id']}";
            $data['url_qrcode'] = $publicUrl;

            $qrImage = QRCode::format('png')->size(200)->generate($publicUrl);
            $data['qr_code_image'] = base64_encode($qrImage);
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
