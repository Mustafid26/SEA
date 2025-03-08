<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Foto;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Actions\DeleteAction;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\DeleteBulkAction;
use App\Filament\Resources\FotoResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\FotoResource\Pages\EditFoto;
use App\Filament\Resources\FotoResource\Pages\ListFotos;
use App\Filament\Resources\FotoResource\Pages\CreateFoto;
use App\Filament\Resources\FotoResource\RelationManagers;

class FotoResource extends Resource
{
    protected static ?string $model = Foto::class;

    protected static ?string $navigationIcon = 'heroicon-o-photograph';

    protected static ?string $recordTitleAttribute = 'title';

    protected static ?string $navigationLabel = 'Foto Beranda';

    protected static ?string $pluralLabel = 'Foto Beranda';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->label('Judul')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),

                Textarea::make('desc')
                    ->label('Deskripsi')
                    ->required()
                    ->maxLength(500)
                    ->columnSpanFull(),

                FileUpload::make('image')
                    ->label('Gambar')
                    ->image()
                    ->required()
                    ->hint(('Maksimal Berukuran 2 Mb'))
                    ->directory('foto-images')
                    ->maxSize(2048) // 2MB
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('Judul')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('desc')
                    ->label('Deskripsi')
                    ->limit(50)
                    ->searchable(),

                ImageColumn::make('image')
                    ->label('Gambar')
                    ->size(50),

                TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y')
                    ->sortable(),
            ])
            ->filters([
                //
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
            'index' => Pages\ListFotos::route('/'),
            'create' => Pages\CreateFoto::route('/create'),
            'edit' => Pages\EditFoto::route('/{record}/edit'),
        ];
    }
}