<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Models\Answer;
use App\Models\AnswerPostest;
use Filament\Resources\Pages\ListRecords; // Changed from Page to ListRecords
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Contracts\View\View;

class ShowJawabanPostest extends ListRecords
{
    protected static string $resource = \App\Filament\Resources\UserResource::class;

    protected function getActions(): array
    {
        return [];
    }

    protected function getTableQuery(): Builder
    {
        // Ambil User ID dari URL (parameter 'record')
        $userId = request()->route('record'); // Dapatkan User ID dari route

        return AnswerPostest::query()->with(['user', 'question'])
            ->where('user_id', $userId); // Filter berdasarkan user_id
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('user.name')->label('Nama Pengguna'),
            TextColumn::make('question.question')->label('Pertanyaan'),
            TextColumn::make('answer')->label('Jawaban'),
        ];
    }

    protected function getTitle(): string
    {
        return 'Jawaban Postest'; // Judul Halaman
    }
}