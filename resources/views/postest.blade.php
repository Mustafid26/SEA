<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Postest</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/logoserat.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Tetap mempertahankan warna dasar dan menambahkan beberapa gaya modern */
        body {
            background-color: #FEE5FD;
            /* Warna latar belakang tetap */
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            /* Menggunakan min-height agar konten tidak terpotong */
            margin: 0;
            font-family: 'Poppins', sans-serif;
            /* Font yang lebih modern */
            overflow: hidden;
            /* Mencegah scrollbar jika ada animasi */
        }

        /* Card container */
        .card-modern {
            background-color: #d73696;
            /* Warna card tetap */
            border-radius: 25px;
            /* Sudut lebih membulat */
            padding: 30px;
            /* Padding lebih besar */
            color: white;
            max-width: 600px;
            width: 100%;
            margin: 20px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            /* Bayangan yang lebih menonjol */
            position: relative;
            overflow: hidden;
            /* Penting untuk efek background shape */
        }

        /* Shape di background card untuk sentuhan modern */
        .card-modern::before {
            content: '';
            position: absolute;
            top: -50px;
            left: -50px;
            width: 200px;
            height: 200px;
            background: rgba(255, 255, 255, 0.1);
            /* Transparan putih */
            border-radius: 50%;
            filter: blur(40px);
            /* Efek blur */
            z-index: 0;
        }

        .card-modern::after {
            content: '';
            position: absolute;
            bottom: -80px;
            right: -80px;
            width: 250px;
            height: 250px;
            background: rgba(255, 255, 255, 0.08);
            /* Transparan putih */
            border-radius: 50%;
            filter: blur(50px);
            z-index: 0;
        }

        /* Progress Bar */
        .progress-modern {
            height: 10px;
            /* Lebih ramping */
            background-color: rgba(255, 255, 255, 0.3);
            /* Latar belakang progress yang transparan */
            border-radius: 5px;
            overflow: hidden;
            margin-bottom: 25px;
        }

        .progress-bar-modern {
            background-color: #FFBF00;
            /* Warna progress bar tetap */
            border-radius: 5px;
            transition: width 0.4s ease-in-out;
            /* Transisi yang lebih halus */
        }

        /* Buttons */
        .btn-modern {
            background-color: #ba4b8e;
            /* Warna tombol tetap */
            border: none;
            border-radius: 12px;
            /* Sudut lebih membulat */
            color: white;
            width: 100%;
            padding: 12px 20px;
            /* Padding lebih besar */
            font-size: 1.1rem;
            font-weight: 600;
            transition: background-color 0.3s ease, transform 0.2s ease;
            /* Transisi hover */
            z-index: 1;
            /* Pastikan di atas background shape */
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .btn-modern:hover {
            background-color: #f33ca9;
            /* Warna hover tetap */
            transform: translateY(-2px);
            /* Efek angkat sedikit */
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            /* Bayangan saat hover */
        }

        .btn-modern:active {
            transform: translateY(0);
            /* Kembali normal saat diklik */
        }

        /* Radio Buttons (Options) */
        .form-check-modern {
            display: flex;
            /* Gunakan flexbox untuk alignment yang lebih baik */
            align-items: center;
            /* Pusatkan secara vertikal */
            position: relative;
            margin-bottom: 15px;
            /* Jarak antar opsi */
            padding: 10px 15px 10px 45px;
            /* Padding untuk teks, ruang untuk custom radio di kiri */
            cursor: pointer;
            user-select: none;
            transition: background-color 0.2s ease;
            border-radius: 10px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            /* Border tipis */
        }

        .form-check-modern:hover {
            background-color: rgba(255, 255, 255, 0.1);
            /* Background hover */
        }

        .form-check-input-modern {
            position: absolute;
            opacity: 0;
            /* Sembunyikan input radio asli */
            cursor: pointer;
            height: 0;
            width: 0;
        }

        /* Custom radio button design */
        .checkmark {
            position: absolute;
            top: 50%;
            /* Pusatkan secara vertikal */
            left: 15px;
            /* Posisi dari kiri label */
            transform: translateY(-50%);
            /* Penyesuaian vertikal */
            height: 22px;
            width: 22px;
            background-color: rgba(255, 255, 255, 0.3);
            /* Warna lingkaran radio */
            border-radius: 50%;
            border: 2px solid white;
            /* Border lingkaran */
            transition: background-color 0.2s ease, border-color 0.2s ease;
        }

        /* Saat radio button terpilih */
        .form-check-input-modern:checked~.checkmark {
            background-color: #FFBF00;
            /* Warna saat terpilih */
            border-color: #FFBF00;
        }

        /* Lingkaran dalam saat terpilih */
        .checkmark:after {
            content: "";
            position: absolute;
            display: none;
        }

        .form-check-input-modern:checked~.checkmark:after {
            display: block;
        }

        .form-check-modern .checkmark:after {
            top: 50%;
            left: 50%;
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: white;
            /* Warna titik tengah */
            transform: translate(-50%, -50%);
        }

        /* Pertanyaan dan Timer */
        .question-title {
            font-size: 1.4rem;
            margin-bottom: 25px;
            line-height: 1.5;
            text-align: center;
            /* Pertanyaan di tengah */
            font-weight: 500;
        }

        .timer-modern {
            text-align: center;
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 25px;
            color: #FFBF00;
            /* Warna timer */
            text-shadow: 0 0 5px rgba(255, 191, 0, 0.5);
            /* Efek glow ringan */
        }

        .card-header-modern {
            font-size: 1.8rem;
            /* Ukuran teks Postest lebih besar */
            font-weight: 700;
            margin-bottom: 30px;
            text-align: center;
            color: white;
            text-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .hidden {
            display: none !important;
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="card-modern">
        <div class="card-header-modern">
            Postest
        </div>
        <div class="timer-modern">
            Waktu Tersisa: <span id="time">02:30</span>
        </div>
        <div class="progress-modern mb-3">
            <div class="progress-bar-modern" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0"
                aria-valuemax="100"></div>
        </div>
        <div class="card-body">
            <form id="quizForm"
                action="{{ route('postest.submit', ['materi_id' => $materi_id, 'kelas_id' => $kelas_id]) }}"
                method="POST">
                @csrf
                <input type="hidden" name="materi_id" value="{{ $materi_id }}">
                @php $totalQuestions = count($questions_postest); @endphp
                @foreach ($questions_postest as $key => $question)
                    <div class="question @if ($key > 0) hidden @endif">
                        <h5 class="question-title">{{ $question->question }}</h5>
                        <div class="space-y-3"> {{-- Tailwind class for vertical spacing --}}
                            <label class="form-check-modern">
                                <input class="form-check-input-modern" type="radio"
                                    name="answers[{{ $question->id }}]" value="{{ $question->option1 }}">
                                <span class="checkmark"></span>
                                <span>{{ $question->option1 }}</span>
                            </label>
                            <label class="form-check-modern">
                                <input class="form-check-input-modern" type="radio"
                                    name="answers[{{ $question->id }}]" value="{{ $question->option2 }}">
                                <span class="checkmark"></span>
                                <span>{{ $question->option2 }}</span>
                            </label>
                            <label class="form-check-modern">
                                <input class="form-check-input-modern" type="radio"
                                    name="answers[{{ $question->id }}]" value="{{ $question->option3 }}">
                                <span class="checkmark"></span>
                                <span>{{ $question->option3 }}</span>
                            </label>
                            <label class="form-check-modern">
                                <input class="form-check-input-modern" type="radio"
                                    name="answers[{{ $question->id }}]" value="{{ $question->option4 }}">
                                <span class="checkmark"></span>
                                <span>{{ $question->option4 }}</span>
                            </label>
                        </div>
                    </div>
                    <input type="hidden" name="questions[]" value="{{ $question->id }}">
                @endforeach

                <div class="mt-8 flex justify-between gap-4"> {{-- Margin top dan jarak antar tombol --}}
                    @if ($totalQuestions > 1)
                        <button class="btn-modern" type="button" id="nextBtn">Lanjut</button>
                        <button class="btn-modern hidden" type="submit" id="submitBtn">Submit</button>
                    @else
                        <button class="btn-modern" type="submit">Submit</button>
                    @endif
                </div>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            var currentQuestion = 0;
            var questions = $('.question');
            var totalQuestions = questions.length;
            var progressBar = $('.progress-bar-modern'); // Pastikan ini mengarah ke kelas yang benar
            var timerDuration = 150; // Timer in seconds (2.5 minutes)
            var timerInterval;

            showQuestion(currentQuestion);
            updateProgress(currentQuestion + 1, totalQuestions);
            startTimer(timerDuration);

            $('#nextBtn').click(function(e) {
                e.preventDefault();
                // Validasi apakah ada jawaban yang dipilih
                var selectedAnswer = $('input[name="answers[' + $(questions[currentQuestion]).find(
                    'input[type="radio"]').attr('name').match(/\d+/)[0] + ']"]:checked');
                if (selectedAnswer.length === 0) {
                    alert('Mohon pilih salah satu jawaban sebelum melanjutkan!');
                    return;
                }

                if (currentQuestion < totalQuestions - 1) {
                    hideQuestion(currentQuestion);
                    currentQuestion++;
                    showQuestion(currentQuestion);
                    updateProgress(currentQuestion + 1, totalQuestions);
                    if (currentQuestion === totalQuestions - 1) {
                        $('#nextBtn').addClass('hidden');
                        $('#submitBtn').removeClass('hidden');
                    }
                }
            });

            function showQuestion(index) {
                $(questions[index]).removeClass('hidden');
            }

            function hideQuestion(index) {
                $(questions[index]).addClass('hidden');
            }

            function updateProgress(current, total) {
                var progress = Math.round((current / total) * 100);
                progressBar.css('width', progress + '%').attr('aria-valuenow', progress);
            }

            function startTimer(duration) {
                var timer = duration,
                    minutes, seconds;
                timerInterval = setInterval(function() {
                    minutes = parseInt(timer / 60, 10);
                    seconds = parseInt(timer % 60, 10);

                    minutes = minutes < 10 ? "0" + minutes : minutes;
                    seconds = seconds < 10 ? "0" + seconds : seconds;

                    $('#time').text(minutes + ":" + seconds);

                    if (--timer < 0) {
                        clearInterval(timerInterval);
                        $('#quizForm').submit(); // Otomatis submit saat waktu habis
                    }
                }, 1000);
            }

            // Mencegah navigasi mundur browser
            (function(window, location) {
                history.replaceState(null, document.title, location.pathname + "#!/stealth");
                history.pushState(null, document.title, location.pathname);

                window.addEventListener("popstate", function() {
                    if (location.hash === "#!/stealth") {
                        history.replaceState(null, document.title, location.pathname);
                        setTimeout(function() {
                            location.replace(
                                "{{ route('kelas') }}"
                            ); // ganti dengan route halaman sebelumnya
                        }, 0);
                    }
                }, false);
            }(window, location));
        });
    </script>
</body>

</html>
