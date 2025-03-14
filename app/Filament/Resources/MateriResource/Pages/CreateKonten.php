<?php

namespace App\Filament\Resources\MateriResource\Pages;

use App\Filament\Resources\MateriResource;
use Filament\Forms;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use App\Models\KontenMateri;
use App\Models\Question;
use App\Models\QuestionPostest;
use App\Models\Materi;

class CreateKonten extends CreateRecord
{
    protected static string $resource = MateriResource::class;

    protected function getFormSchema(): array
    {
        return [
            Forms\Components\TextInput::make('judul_materi')
                ->label('Judul Materi')
                ->default(fn() => optional(Materi::find(request()->route('record')))->judul_materi)
                ->disabled()
                ->required(),

            Forms\Components\TextInput::make('nama_kelas')
                ->label('Nama Kelas')
                ->default(fn() => optional(Materi::find(request()->route('record'))?->kelas)->nama_kelas)
                ->disabled()
                ->required(),

            Forms\Components\Select::make('jenis_konten')
                ->label('Jenis Konten')
                ->options([
                    'pdf' => 'PDF',
                    'pretest' => 'Pretest',
                    'postest' => 'Postest',
                ])
                ->required()
                ->reactive(),

            Forms\Components\FileUpload::make('konten')
                ->label('Upload PDF')
                ->disk('public')
                ->directory('konten_materi')
                ->acceptedFileTypes(['application/pdf'])
                ->maxSize(2048)
                ->hidden(fn($get) => $get('jenis_konten') !== 'pdf')
                ->required(fn($get) => $get('jenis_konten') === 'pdf'),

            Forms\Components\TextInput::make('desc')
                ->label('Deskripsi')
                ->nullable()
                ->maxLength(255)
                ->hidden(fn($get) => $get('jenis_konten') !== 'pdf'),

            Forms\Components\TextInput::make('question')
                ->label('Pertanyaan')
                ->hidden(fn($get) => !in_array($get('jenis_konten'), ['pretest', 'postest']))
                ->required(fn($get) => in_array($get('jenis_konten'), ['pretest', 'postest'])),

            Forms\Components\TextInput::make('option1')
                ->label('Opsi 1')
                ->hidden(fn($get) => !in_array($get('jenis_konten'), ['pretest', 'postest']))
                ->required(fn($get) => in_array($get('jenis_konten'), ['pretest', 'postest'])),

            Forms\Components\TextInput::make('option2')
                ->label('Opsi 2')
                ->hidden(fn($get) => !in_array($get('jenis_konten'), ['pretest', 'postest']))
                ->required(fn($get) => in_array($get('jenis_konten'), ['pretest', 'postest'])),

            Forms\Components\TextInput::make('option3')
                ->label('Opsi 3')
                ->hidden(fn($get) => !in_array($get('jenis_konten'), ['pretest', 'postest']))
                ->required(fn($get) => in_array($get('jenis_konten'), ['pretest', 'postest'])),

            Forms\Components\TextInput::make('option4')
                ->label('Opsi 4')
                ->hidden(fn($get) => !in_array($get('jenis_konten'), ['pretest', 'postest']))
                ->required(fn($get) => in_array($get('jenis_konten'), ['pretest', 'postest'])),

            Forms\Components\Select::make('correct_answer')
                ->label('Jawaban Benar')
                ->options([
                    'option1' => 'Opsi 1',
                    'option2' => 'Opsi 2',
                    'option3' => 'Opsi 3',
                    'option4' => 'Opsi 4',
                ])
                ->hidden(fn($get) => !in_array($get('jenis_konten'), ['pretest', 'postest']))
                ->required(fn($get) => in_array($get('jenis_konten'), ['pretest', 'postest'])),
        ];
    }


    protected function handleRecordCreation(array $data): Model
    {
        $materi = Materi::with('kelas')->find(request()->route('record')); 
        $kelasId = optional($materi?->kelas)->id;
        

        $correctAnswer = match ($data['correct_answer']) {
            'option1' => $data['option1'],
            'option2' => $data['option2'],
            'option3' => $data['option3'],
            'option4' => $data['option4'],
            default => null
        };

        if ($data['jenis_konten'] === 'pdf') {
            return KontenMateri::create([
                'materi_id' => $materi->id,
                'kelas_id' => $kelasId,
                'konten' => $data['konten'],
                'desc' => $data['desc'],
            ]);
        } elseif ($data['jenis_konten'] === 'pretest') {
            return Question::create([
                'kelas_id' => $kelasId,
                'question' => $data['question'],
                'option1' => $data['option1'],
                'option2' => $data['option2'],
                'option3' => $data['option3'],
                'option4' => $data['option4'],
                'correct_answer' => $correctAnswer,
            ]);
        } else { // Postest
            return QuestionPostest::create([
                'kelas_id' => $kelasId,
                'question' => $data['question'],
                'option1' => $data['option1'],
                'option2' => $data['option2'],
                'option3' => $data['option3'],
                'option4' => $data['option4'],
                'correct_answer' => $correctAnswer,
            ]);
        }
    }

}