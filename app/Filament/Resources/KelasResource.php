<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KelasResource\Pages;
use App\Filament\Resources\KelasResource\RelationManagers;
use App\Models\Kelas;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KelasResource extends Resource
{
    protected static ?string $model = Kelas::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    protected static ?string $navigationGroup = 'Kelas';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_kelas')
                    ->label('Nama Kelas')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('detail_kelas')
                    ->label('Detail Kelas')
                    ->maxLength(255)
                    ->required(),

                Forms\Components\Select::make('rombel_id')
                    ->label('Rombel')
                    ->relationship('rombel', 'name') // Mengambil nama rombel dari relasi
                    ->searchable() // Bisa dicari jika banyak data
                    ->preload() // Memuat opsi lebih cepat
                    ->required(),

                Forms\Components\Textarea::make('deskripsi')
                    ->label('Deskripsi')
                    ->maxLength(500)
                    ->required(),

                Forms\Components\FileUpload::make('image')
                    ->label('Gambar Kelas')
                    ->image()
                    ->columnSpanFull()
                    ->preserveFilenames()
                    ->hint('Maksimal Berukuran 2 Mb')
                    ->directory('kelas-images') // Menyimpan ke storage
                    ->maxSize(2048), // Batas ukuran file 2MB
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_kelas')
                    ->label('Nama Kelas')
                    ->searchable(),

                Tables\Columns\TextColumn::make('detail_kelas')
                    ->label('Detail Kelas')
                    ->searchable(),

                Tables\Columns\TextColumn::make('rombel.name')
                    ->label('Rombel')
                    ->searchable(),

                Tables\Columns\TextColumn::make('deskripsi')
                    ->label('Deskripsi')
                    ->limit(50),

                Tables\Columns\ImageColumn::make('image')
                    ->label('Gambar')
                    ->circular(),
            ])
            ->filters([
                // Tambahkan filter jika diperlukan
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListKelas::route('/'),
            'create' => Pages\CreateKelas::route('/create'),
            'edit' => Pages\EditKelas::route('/{record}/edit'),
        ];
    }
}