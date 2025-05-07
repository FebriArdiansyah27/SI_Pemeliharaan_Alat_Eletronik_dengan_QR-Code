<?php
// app/Filament/Resources/UserResource.php

namespace App\Filament\Resources;

use App\Models\User;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use App\Filament\Resources\UserResource\Pages;
use Illuminate\Database\Eloquent\Model;

class UserResource extends Resource
{
    protected static ?string $model = User::class;
    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationLabel = 'Manajemen User';
    protected static ?string $navigationGroup = 'Manajemen';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                TextInput::make('name')->required()->maxLength(255),
                TextInput::make('email')->email()->required()->maxLength(255),
                TextInput::make('password')
                    ->password()
                    ->required(fn ($livewire) => $livewire instanceof Pages\CreateUser)
                    ->minLength(8)
                    ->dehydrateStateUsing(fn ($state) => $state ? bcrypt($state) : null),
                Select::make('role')
                    ->options([
                        'admin' => 'Admin',
                        'teknisi' => 'Teknisi',
                    ])
                    ->required()
                    ->default('teknisi'),
            ]);
    }


    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->sortable()->searchable(),
                TextColumn::make('email')->sortable()->searchable(),
                TextColumn::make('role')->sortable(),
                TextColumn::make('created_at')->dateTime()->label('Created'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),

            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
// Batasi akses hanya admin
public static function canViewAny(): bool
{
    return auth()->check() && auth()->user()->role === 'admin';
}

public static function canCreate(): bool
{
    return auth()->check() && auth()->user()->role === 'admin';
}

public static function canEdit(Model $record): bool
{
    return auth()->check() && auth()->user()->role === 'admin';
}

public static function canDelete(Model $record): bool
{
    return auth()->check() && auth()->user()->role === 'admin';
}

// Sembunyikan menu dari teknisi


    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}

