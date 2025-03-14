<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Materi;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\Select;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\DeleteBulkAction;
use App\Filament\Resources\MateriResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\MateriResource\Pages\EditMateri;
use App\Filament\Resources\MateriResource\RelationManagers;
use App\Filament\Resources\MateriResource\Pages\ListMateris;
use App\Filament\Resources\MateriResource\Pages\CreateMateri;

class MateriResource extends Resource
{
    protected static ?string $model = Materi::class;

    protected static ?string $navigationIcon = 'heroicon-s-library';

    protected static ?string $navigationGroup = 'Kelas';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('kelas_id')
                    ->label('Kelas')
                    ->relationship('kelas', 'nama_kelas') // Sesuaikan dengan nama kolom di tabel kelas
                    ->searchable()
                    ->preload()
                    ->required(),

                TextInput::make('judul_materi')
                    ->label('Judul Materi')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('kelas.nama_kelas')
                    ->label('Kelas')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('judul_materi')
                    ->label('Judul Materi')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tanggal Dibuat')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),

                Tables\Actions\Action::make('add_konten')
                    ->label('Add Konten')
                    ->icon('heroicon-o-plus-circle') // Ikon tambah
                    ->color('success')
                    ->action(fn($record) => redirect()->to(MateriResource::getUrl('create-konten', ['record' => $record->id]))),

                Tables\Actions\Action::make('show_konten')
                    ->label('Show Konten')
                    ->icon('heroicon-o-eye') // Ikon mata
                    ->color('info')
                    ->action(fn($record) => redirect()->to(MateriResource::getUrl('show-konten', ['record' => $record->id]))),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListMateris::route('/'),
            'create' => Pages\CreateMateri::route('/create'),
            'edit' => Pages\EditMateri::route('/{record}/edit'),
            'create-konten' => Pages\CreateKonten::route('/{record}/create-konten'),
            'show-konten' => Pages\ShowKonten::route('/{record}/show-konten'),
        ];
    }
}