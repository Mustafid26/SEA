<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PretestUserResource\Pages;
use App\Filament\Resources\PretestUserResource\RelationManagers;
use App\Models\PretestUser;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;



class PretestUserResource extends Resource
{
    protected static ?string $model = PretestUser::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'Assessments';


    public static function canCreate(): bool
    {
        return false;
    }

    public static function getGloballySearchableAttributes(): array
    {
        return [
            'user.name',
        ];
    }




    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('user_id')
                    ->label('User ID')
                    ->disabled()
                    ->required(),

                Forms\Components\Select::make('kelas_id')
                    ->label('Kelas')
                    ->relationship('kelas', 'nama_kelas')
                    ->disabled()
                    ->required(),

                Forms\Components\TextInput::make('score')
                    ->label('Score')
                    ->numeric()
                    ->required(),

                Forms\Components\Hidden::make('created_at')
                    ->default(Carbon::now()), // Menggunakan Carbon untuk nilai default
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('User')
                    ->sortable(),

                Tables\Columns\TextColumn::make('materi.judul_materi')
                    ->label('Materi')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('score')
                    ->label('Score')
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Created At')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([])
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

    public static function query(Builder $query): Builder
    {
        return $query->with(['user']); // Pastikan relasi user dimuat
    }


    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPretestUsers::route('/'),
            'edit' => Pages\EditPretestUser::route('/{record}/edit'),
        ];
    }
}