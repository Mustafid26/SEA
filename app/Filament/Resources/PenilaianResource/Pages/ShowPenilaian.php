<?php

namespace App\Filament\Resources\PenilaianResource\Pages;

use Filament\Tables;
use App\Models\Submit;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Resources\Pages\ViewRecord;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\PenilaianResource;

class ShowPenilaian extends ListRecords
{
    protected static string $resource = PenilaianResource::class;

    protected function getTableQuery(): Builder
    {
        // Ambil User ID dari URL (parameter 'record')
        $userId = request()->route('record'); // Dapatkan User ID dari route

        return Submit::query()->with(['user', 'body'])
            ->where('user_id', $userId); // Filter berdasarkan user_id
    }
    
    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('user.nama_lengkap')->label('Nama Pengguna')->searchable()->sortable(),
            TextColumn::make('body')->label('Link')->searchable()->sortable(),
        ];
    }
    // public function table(Table $table): Table
    // {
    //     return $table
    //         ->columns([
    //             Tables\Columns\TextColumn::make('user.nama_lengkap')
    //                 ->label('Nama Lengkap')
    //                 ->searchable()
    //                 ->sortable(),
    
    //             Tables\Columns\TextColumn::make('body')
    //                 ->label('Link')
    //                 ->formatStateUsing(fn ($state) => "<a href='{$state}' target='_blank' class='text-blue-500 underline'>Buka</a>")
    //                 ->html(), // Mengaktifkan HTML agar link bisa diklik
    //         ])
    //         ->actions([
    //             Tables\Actions\DeleteAction::make(),
    //         ]);
    // }
}