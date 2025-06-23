<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Phpsa\FilamentPasswordReveal\Password;
use Filament\Tables\Actions\DeleteBulkAction;
use App\Filament\Resources\UserResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\UserResource\Pages\EditUser;
use App\Filament\Resources\UserResource\Pages\ListUsers;
use App\Filament\Resources\UserResource\Pages\CreateUser;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Filament\Resources\UserResource\Pages\ShowJawabanPostest;
use App\Filament\Resources\UserResource\Pages\ShowJawabanPretest;



class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?string $navigationGroup = 'Users';

    protected static ?string $navigationLabel = 'Siswa';

    protected static ?string $pluralLabel = 'Siswa';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Username')
                    ->required()
                    ->maxLength(255),

                TextInput::make('nama_lengkap')
                    ->label('Nama Lengkap')
                    ->required()
                    ->maxLength(255),

                Select::make('rombel_id')
                    ->label('Rombel')
                    ->relationship('rombel', 'name') // Mengambil nama rombel dari relasi
                    ->searchable() // Bisa dicari jika banyak data
                    ->preload() // Memuat opsi lebih cepat
                    ->required(),

                Select::make('usertype')
                    ->label('User Type')
                    ->options([
                        '0' => '0', // Hanya menyimpan string angka
                        '1' => '1',
                        '2' => '2',
                    ])
                    ->default('0')
                    ->required()
                    ->reactive()
                    ->afterStateUpdated(
                        fn($state, callable $set) =>
                        $set('role', match ($state) {
                            '0' => 'user',
                            '1' => 'admin',
                            '2' => 'sekari',
                        })
                    ),
                Select::make('role')
                    ->label('Role')
                    ->options([
                        'user' => 'User',
                        'sekari' => 'Sekari',
                    ])
                    ->default('user')
                    ->required()
                    ->disabled()
                    ->dehydrated(),

                Password::make('password')
                    ->password()
                    ->maxLength(255)
                    ->revealable()
                    ->dehydrateStateUsing(fn($state) => bcrypt($state)) // Hash password
                    ->required(fn($record) => $record === null)  // Hanya required saat membuat user baru atau mengganti password
                    ->dehydrated(fn($state) => filled($state)), // Sembunyikan password saat edit

                FileUpload::make('profile_photo_path')
                    ->label('Foto Profil')
                    ->image()
                    ->directory('profile-photos')
                    ->preserveFilenames()
                    ->columnSpanFull()
                    ->nullable()

            ]);

    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Username')->sortable()->searchable(),
                TextColumn::make('nama_lengkap')->label('Nama Lengkap')->sortable()->searchable(),
                TextColumn::make('rombel.name')
                    ->label('Rombel')
                    ->searchable(),
                TextColumn::make('role')->label('Role')->sortable(),
                ImageColumn::make('profile_photo_path')->label('Foto Profil'),
            ])
            ->filters([])
            ->actions([
                EditAction::make(),
                Action::make('lihat_jawaban')
                    ->label('Lihat Jawaban')
                    ->icon('heroicon-o-eye') // Ikon mata
                    ->modalHeading('Pilih Jenis Jawaban') // Menentukan judul modal
                    ->form([
                        Radio::make('jenis_jawaban')
                            ->label('Pilih Jenis Jawaban')
                            ->options([
                                'pretest' => 'Pretest',
                                'posttest' => 'Posttest',
                            ])
                            ->required(),
                    ])
                    ->action(fn($record, $data) => redirect()->to(
                        UserResource::getUrl(
                            $data['jenis_jawaban'] === 'pretest' ? 'show-jawaban-pretest' : 'show-jawaban-postest',
                            ['record' => $record->id] // Hanya perlu record->id
                        )
                    ))
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
            'show-jawaban-pretest' => ShowJawabanPretest::route('/{record}/jawaban-pretest'),
            'show-jawaban-postest' => ShowJawabanPostest::route('/{record}/jawaban-postest'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }


}