<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\KontenMateri;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Repeater;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Actions\DeleteAction;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\DeleteBulkAction;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\KontenMateriResource\Pages;
use App\Filament\Resources\KontenMateriResource\RelationManagers;
use App\Filament\Resources\KontenMateriResource\Pages\EditKontenMateri;
use App\Filament\Resources\KontenMateriResource\Pages\ListKontenMateris;
use App\Filament\Resources\KontenMateriResource\Pages\CreateKontenMateri;
use Illuminate\Validation\Rule;
use Filament\Notifications\Notification;

class KontenMateriResource extends Resource
{
    protected static ?string $model = KontenMateri::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationGroup = 'Kelas';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->with(['materi', 'materi.kelas']) // Memuat relasi materi
            ->withCount(['questions', 'questions_postest']); // Menghitung jumlah soal
    }



    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('materi_id')
                    ->label('Judul Materi')
                    ->relationship('materi', 'judul_materi')
                    ->required()
                    ->rule(function ($get, $component) {
                        $record = $component->getContainer()->getRecord();
                        return Rule::unique('konten_materi', 'materi_id')
                            ->ignore($record?->id); // Abaikan id saat update
                    })
                    ->hint(function ($state, $get, $component) {
                        $record = $component->getContainer()->getRecord();

                        $exists = KontenMateri::where('materi_id', $state)
                            ->when($record?->id, fn($q) => $q->where('id', '!=', $record->id))
                            ->exists();

                        if ($exists) {
                            return '⚠️ Materi ini sudah memiliki konten. Menginput ulang dapat menimbulkan duplikasi.';
                        }

                        return null;
                    })
                    ->hintColor('danger'),

                FileUpload::make('pdf_path')
                    ->label('Upload PDF')
                    ->directory('pdf_materi')
                    ->preserveFilenames()
                    ->hint('Maksimal 5 Mb')
                    ->required()
                    ->maxSize(5120),

                TextInput::make('name')
                    ->label('Nama PDF')
                    ->required()
                    ->maxLength(255),

                TextInput::make('desc')
                    ->label('Deskripsi PDF')
                    ->hint("Maksimal 500 karakter")
                    ->required()
                    ->maxLength(500),

                Repeater::make('questions')
                    ->relationship('questions')
                    ->schema([
                        TextInput::make('question')->label('Pertanyaan')->required(),
                        TextInput::make('option1')->label('Opsi 1')->required()->reactive(),
                        TextInput::make('option2')->label('Opsi 2')->required()->reactive(),
                        TextInput::make('option3')->label('Opsi 3')->required()->reactive(),
                        TextInput::make('option4')->label('Opsi 4')->required()->reactive(),                        
                        Select::make('correct_answer')
                        ->label('Jawaban Benar')
                        ->required()
                        ->options(function ($get) {
                            $options = [];
                            if ($get('option1')) {
                                $options[$get('option1')] = 'Opsi 1';
                            }
                            if ($get('option2')) {
                                $options[$get('option2')] = 'Opsi 2';
                            }
                            if ($get('option3')) {
                                $options[$get('option3')] = 'Opsi 3';
                            }
                            if ($get('option4')) {
                                $options[$get('option4')] = 'Opsi 4';
                            }
                            return $options;
                        })
                        ->reactive(),
                    ])
                    ->columns(2)
                    ->label('Pretest'),

                Repeater::make('questions_postest')
                    ->relationship('questions_postest')
                    ->schema([
                        TextInput::make('question')->label('Pertanyaan')->required(),
                        TextInput::make('option1')->label('Opsi 1')->required(),
                        TextInput::make('option2')->label('Opsi 2')->required(),
                        TextInput::make('option3')->label('Opsi 3')->required(),
                        TextInput::make('option4')->label('Opsi 4')->required(),
                        Select::make('correct_answer')
                            ->label('Jawaban Benar')
                            ->required()
                            ->options(function ($get) {
                                return [
                                    'option1' => $get('option1') ?: 'Opsi 1',
                                    'option2' => $get('option2') ?: 'Opsi 2',
                                    'option3' => $get('option3') ?: 'Opsi 3',
                                    'option4' => $get('option4') ?: 'Opsi 4',
                                ];
                            }),
                    ])
                    ->columns(2)
                    ->label('Postest'),
            ]);



    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('materi.kelas.nama_kelas')
                    ->label('Kelas')
                    ->searchable(),
                TextColumn::make('materi.judul_materi')
                    ->label('Materi')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('pdf_path')->label('PDF')->url(fn($record) => asset('storage/' . $record->pdf_path)),
                Tables\Columns\TextColumn::make('questions_count')
                    ->label('Jumlah Pretest')
                    ->sortable(),

                Tables\Columns\TextColumn::make('questions_postest_count')
                    ->label('Jumlah Postest')
                    ->sortable(),

            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
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
            'index' => Pages\ListKontenMateris::route('/'),
            'create' => Pages\CreateKontenMateri::route('/create'),
            'edit' => Pages\EditKontenMateri::route('/{record}/edit'),
        ];
    }
}