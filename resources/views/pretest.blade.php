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
            height: 5px;
        }
        .progress-bar {
            background-color: #FFBF00;
        }
        .btn-custom {
            background-color: #265D65;
            border: none;
            border-radius: 10px;
            color: white;
            display: block;
            margin: 20px auto 0;
            width: 100%;
        }
        .btn-custom:hover {
            background-color: #1B4349;
        }
        .form-check-label {
            color: white;
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="card-header text-center">
            Pretest
        </div>
        <div class="progress mb-3">
            <div class="progress-bar" role="progressbar" style="width: 7%;" aria-valuenow="7" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <div class="card-body">
            <form action="{{ route('pretest.submit', ['materi' => $materi->id]) }}" method="POST">
                @csrf
                <input type="hidden" name="materi_id" value="{{ $materi->id }}">
                @foreach ($questions as $question)
                <div class="mb-4">
                    <h5 class="card-title">{{ $question->question }}</h5>
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
                <button class="btn btn-custom" type="submit">Lanjut</button>
            </form>            
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
