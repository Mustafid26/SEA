<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Models\Answer;
use App\Models\AnswerPostest;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Contracts\View\View;
use Filament\Tables\Table;

class ShowJawabanPostest extends ListRecords
{
    protected static string $resource = \App\Filament\Resources\UserResource::class;

    protected function getActions(): array
    {
        return [];
    }

    protected function getTableQuery(): Builder
    {
        $userId = request()->route('record');

        return AnswerPostest::query()->with(['user', 'question'])
            ->where('user_id', $userId);
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
        return 'Jawaban Postest';
    }

    protected function getTableActions(): array
    {
        return [];
    }

    protected function getTableBulkActions(): array
    {
        return [];
    }

    /**
     * Membuat baris tabel tidak bisa diklik dengan mengembalikan closure yang selalu null.
     */
    protected function getTableRecordUrlUsing(): ?\Closure
    {
        // Mengembalikan closure yang selalu null, agar baris tidak dapat diklik.
        return fn (): ?string => null;
    }
}