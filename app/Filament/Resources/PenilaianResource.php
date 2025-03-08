<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Penilaian;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\PenilaianResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PenilaianResource\RelationManagers;

class PenilaianResource extends Resource
{
    protected static ?string $model = Penilaian::class;

    protected static ?string $navigationIcon = 'heroicon-o-check-circle';

    protected static ?string $navigationGroup = 'Assessments';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('judul')
                    ->label('Judul')
                    ->required()
                    ->maxLength(255),

                Textarea::make('detail')
                    ->label('Detail')
                    ->required(),

                // TextInput::make('rombel')
                //     ->label('Rombel')
                //     ->maxLength(255),

                FileUpload::make('image')
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
                TextColumn::make('judul')
                    ->label('Judul')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('detail')
                    ->label('Detail')
                    ->limit(50),

                // TextColumn::make('rombel')
                //     ->label('Rombel')
                //     ->sortable()
                //     ->searchable(),

                ImageColumn::make('image')
                    ->label('Gambar')
                    ->size(50),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),

                Tables\Actions\Action::make('hasil_penilaian')
                    ->label('Lihat Hasil')
                    ->icon('heroicon-o-eye') // Ikon mata
                    ->color('primary') // Warna tombol
                    ->action(fn($record) => redirect()->to(
                        PenilaianResource::getUrl('icikiwir', ['record' => $record->id])
                    )),
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
            'index' => Pages\ListPenilaians::route('/'),
            'create' => Pages\CreatePenilaian::route('/create'),
            'edit' => Pages\EditPenilaian::route('/{record}/edit'),
            'icikiwir' => Pages\Icikiwir::route('/{record}/icikiwir'),
        ];
    }
}
