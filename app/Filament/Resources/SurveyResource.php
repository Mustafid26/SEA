<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Survey;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\DeleteBulkAction;
use App\Filament\Resources\SurveyResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\SurveyResource\RelationManagers;
use App\Filament\Resources\SurveyResource\Pages\ListSurveys;

class SurveyResource extends Resource
{
    protected static ?string $model = Survey::class;

    protected static ?string $navigationIcon = 'heroicon-o-chart-bar';

    protected static ?string $navigationGroup = 'Users';
    protected static ?string $navigationLabel = 'Survey Kepuasan';

    public static function canCreate(): bool
    {
        return false;
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')
                    ->label('User')
                    ->searchable(),

                TextColumn::make('kelas.nama_kelas')
                    ->label('Kelas')
                    ->searchable(),

                TextColumn::make('survey')
                    ->label('Hasil Survey'),

                TextColumn::make('saran')
                    ->label('Saran'),

                TextColumn::make('created_at')
                    ->label('Created At')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('survey')
                    ->label('Filter Hasil Survey')
                    ->options([
                        'Puas' => 'Puas',
                        'Cukup Puas' => 'Cukup Puas',
                        'Kecewa' => 'Kecewa',
                    ])
                    ->attribute('survey'),
            ])
            ->actions([
                DeleteAction::make()
                    ->label('Hapus')
                    ->requiresConfirmation()
                    ->color('danger'),
            ])
            ->bulkActions([
                DeleteBulkAction::make(),
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
            'index' => Pages\ListSurveys::route('/'),
        ];
    }
}