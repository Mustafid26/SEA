<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use App\Models\Admin;
use Filament\Resources\Form;
use Filament\Resources\Table;
use GuzzleHttp\Promise\Create;
use Filament\Resources\Resource;
use Illuminate\Support\Collection;
use Filament\Forms\Components\Card;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Builder;
use Phpsa\FilamentPasswordReveal\Password;
use App\Filament\Resources\AdminResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\AdminResource\RelationManagers;

class AdminResource extends Resource
{
    protected static ?string $model = Admin::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-circle';

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?string $navigationGroup = 'Users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    TextInput::make('name')
                        ->required()
                        ->maxLength(255),
                    TextInput::make('email')
                        ->email()
                        ->required()
                        ->maxLength(255),
                    Password::make('password')
                        ->password()
                        ->maxLength(255)
                        ->revealable()
                        ->dehydrateStateUsing(fn($state) => bcrypt($state)) // Hash password
                        ->required(fn($record) => $record === null)  // Hanya required saat membuat user baru atau mengganti password
                        ->dehydrated(fn($state) => filled($state)), // Sembunyikan password saat edit
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->sortable()->searchable(),
                TextColumn::make('email')->sortable()->searchable(),
                TextColumn::make('created_at')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make()
                    ->hidden(fn (User $record) => $record->id === auth()->id())
                    ->before(function (Tables\Actions\BulkAction $action, Collection $records) {
                        // Check if records contain the current user
                        if ($records->contains(function ($record) {
                            return $record->id === auth()->id();
                        })) {
                            // Create and dispatch notification
                            Notification::make()
                                ->warning()
                                ->title('Cannot delete yourself')
                                ->body('You are not allowed to delete your own account.')
                                ->persistent()
                                ->send();
                            
                            // Cancel the action
                            $action->cancel();
                            
                            // Return false to ensure action stops
                            return false;
                        }
                    }),
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
            'index' => Pages\ListAdmins::route('/'),
            'create' => Pages\CreateAdmin::route('/create'),
            'edit' => Pages\EditAdmin::route('/{record}/edit'),
        ];
    }
}