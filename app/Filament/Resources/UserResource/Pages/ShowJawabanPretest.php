<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Models\Answer;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;

class ShowJawabanPretest extends ListRecords
{
    protected static string $resource = \App\Filament\Resources\UserResource::class;

    protected function getActions(): array
    {
        return [];
    }

    protected function getTableQuery(): Builder
    {
        $userId = request()->route('record');

        return Answer::query()->with(['user', 'question', 'kelas']) // Pastikan 'kelas' di-load
            ->where('user_id', $userId);
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('kelas.nama_kelas')->label('Nama Kelas'),
            TextColumn::make('user.name')->label('Nama Pengguna'),
            TextColumn::make('question.question')->label('Pertanyaan'),
            TextColumn::make('answer')->label('Jawaban'),
        ];
    }

    protected function getTitle(): string
    {
        return 'Jawaban Pretest';
    }

    protected function getTableActions(): array
    {
        return []; // Hilangkan actions default
    }

    protected function getTableBulkActions(): array
    {
        return []; // Hilangkan bulk actions default
    }
}