<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Presensi;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\DeleteBulkAction;
use App\Filament\Resources\PresensiResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PresensiResource\RelationManagers;
use App\Filament\Resources\PresensiResource\Pages\EditPresensi;
use App\Filament\Resources\PresensiResource\Pages\ListPresensis;
use App\Filament\Resources\PresensiResource\Pages\CreatePresensi;

class PresensiResource extends Resource
{
    protected static ?string $model = Presensi::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'Users';
    protected static ?string $navigationLabel = 'Presensi';

    public static function canCreate(): bool
    {
        return false;
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')
                    ->label('User')
                    ->sortable(),

                TextColumn::make('materi.judul_materi')
                    ->label('Kelas')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('kehadiran')
                    ->label('Kehadiran')
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Created At')
                    ->dateTime()
                    ->sortable(),
            ])
            ->actions([
                DeleteAction::make()
                    ->label('Hapus')
                    ->requiresConfirmation()
                    ->color('danger'),
            ])
            ->filters([
                SelectFilter::make('kehadiran')
                    ->label('Filter Kehadiran')
                    ->options([
                        'hadir' => 'Hadir',
                        'izin' => 'Izin',
                        'tidak_hadir' => 'Tidak Hadir',
                    ])
                    ->attribute('kehadiran'),
            ])
            ->bulkActions([
                DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPresensis::route('/'),
        ];
    }
}