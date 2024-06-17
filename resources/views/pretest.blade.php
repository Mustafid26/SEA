<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pretest</title>
    <link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <style>
        body {
            background-color: #11595C;
            color: white;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }
        .card {
            background-color: #124C4F;
            border-radius: 15px;
            padding: 20px;
            color: white;
            max-width: 600px;
            width: 100%;
        }
        .card-header {
            background-color: transparent;
            border: none;
            font-size: 1.2rem;
        }
        .progress {
            height: 20px;
            margin-bottom: 20px;
        }
        .progress-bar {
            background-color: #FFBF00;
        }
        .btn-custom {
            background-color: #265D65;
            border: none;
            border-radius: 10px;
            color: white;
            width: 100%;
        }
        .btn-custom:hover {
            background-color: #1B4349;
        }
        .form-check-label {
            color: white;
        }
        .hidden {
            display: none;
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="card-header text-center">
            Pretest
        </div>
        <div class="progress mb-3">
            <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <div class="card-body">
            <form id="quizForm" action="{{ route('pretest.submit', ['kelas' => $kelas->id]) }}" method="POST">
                @csrf
                <input type="hidden" name="kelas_id" value="{{ $kelas->id }}">
                @php $totalQuestions = count($questions); @endphp
                @foreach ($questions as $key => $question)
                <div class="question @if($key > 0) hidden @endif">
                    <h5 class="card-title" style="color:white;">{{ $question->question }}</h5>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="answers[{{ $question->id }}]" id="option1-{{ $question->id }}" value="{{ $question->option1 }}">
                        <label class="form-check-label" for="option1-{{ $question->id }}">
                            {{ $question->option1 }}
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="answers[{{ $question->id }}]" id="option2-{{ $question->id }}" value="{{ $question->option2 }}">
                        <label class="form-check-label" for="option2-{{ $question->id }}">
                            {{ $question->option2 }}
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="answers[{{ $question->id }}]" id="option3-{{ $question->id }}" value="{{ $question->option3 }}">
                        <label class="form-check-label" for="option3-{{ $question->id }}">
                            {{ $question->option3 }}
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="answers[{{ $question->id }}]" id="option4-{{ $question->id }}" value="{{ $question->option4 }}">
                        <label class="form-check-label" for="option4-{{ $question->id }}">
                            {{ $question->option4 }}
                        </label>
                    </div>
                </div>
                @endforeach
                @if ($totalQuestions > 1)
                <button class="btn btn-custom" type="button" id="nextBtn">Next</button>
                <button class="btn btn-custom hidden" type="submit" id="submitBtn">Submit</button>
                @else
                <button class="btn btn-custom" type="submit">Submit</button>
                @endif
            </form>            
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            var currentQuestion = 0;
            var questions = $('.question');
            var totalQuestions = questions.length;
            var progressBar = $('.progress-bar');

            showQuestion(currentQuestion);
            updateProgress(currentQuestion + 1, totalQuestions);

            $('#nextBtn').click(function(e) {
                e.preventDefault();
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
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
