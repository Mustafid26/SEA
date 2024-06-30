<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comingsoon</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,500;1,600;1,700;1,800&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Comforter+Brush&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/SEA-Login.png') }}">
    <script src="https://cdn.tailwindcss.com?plugins=typography"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'Montserrat': ['Montserrat'],
                        'Noto-Sans': ['"Noto Sans"'],
                        'Comforter-Brush': ['"Comforter Brush"']
                    }
                }
            }
        }
    </script>

</head>

<body class="font-Noto-Sans">
    <!-- Header -->
    <header class="w-full bg-cover bg-bottom" style="background-color: #8cdedd">
        <div class="w-full min-h-screen md:w-1/2 p-10 flex">
            <div class="w-full text-center my-auto">
                <img src="{{asset('img/SEA.png')}}" alt="" srcset="">
                <h6
                    class="font-Montserrat font-bold uppercase text-4xl md:text-5xl lg:text-6xl mb-14 md:-mr-20 text-black md:text-right">
                    Coming <span class="text-black/70 md:-mr-20">soon</span></h6>
                <!-- Count down -->
                <div class="w-full text-left flex mb-10">
                    <ul class="w-full flex place-content-center md:place-content-end gap-5 mx-auto text-gray-50">
                        <li>
                            <div class="font-bold text-white rounded-full border-dotted border-gray-700 border-4 flex items-center justify-center text-2xl lg:text-4xl h-16 lg:h-24 w-16 lg:w-24"
                                id="cdD">00</div>
                            <p class="text-center text-xs mt-2">Days</p>
                        </li>

                        <li>
                            <div class="font-bold text-white rounded-full border-dotted border-gray-700 border-4 flex items-center justify-center text-2xl lg:text-4xl h-16 lg:h-24 w-16 lg:w-24"
                                id="cdH">00</div>
                            <p class="text-center text-xs mt-2">Hours</p>
                        </li>

                        <li>
                            <div class="font-bold text-white rounded-full border-dotted border-gray-700 border-4 flex items-center justify-center text-2xl lg:text-4xl h-16 lg:h-24 w-16 lg:w-24"
                                id="cdM">00</div>
                            <p class="text-center text-xs mt-2">Minutes</p>
                        </li>

                        <li>
                            <div class="font-bold text-white rounded-full border-dotted border-gray-700 border-4 flex items-center justify-center text-2xl lg:text-4xl h-16 lg:h-24 w-16 lg:w-24"
                                id="cdS">00</div>
                            <p class="text-center text-xs mt-2">Seconds</p>
                        </li>

                    </ul>
                </div>

                <!-- Content -->
                <p class="text-base mb-10 text-black md:text-right ">Fitur sedang dalam tahap pengembangan
                    <br> untuk informasi lebih lanjut silahkan hubungi kami
                </p>
                </p>

                <!-- Social media -->
                <div class="w-full text-left flex">
                    <ul class="w-full flex place-content-center md:place-content-end gap-10 mx-auto text-gray-500">
                        <li>
                            <a href="https://facebook.com/hmti.udinus" class="text-lg hover:text-amber-500">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </li>

                        <li>
                            <a href="https://twitter.com/hmti_udinus" class="text-lg hover:text-amber-500">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </li>

                        <li>
                            <a href="https://instagram.com/ppko_hmtiudinus" class="text-lg hover:text-amber-500">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </li>

                    </ul>
                </div>

            </div>
        </div>
    </header>

    <script>
        // Change the value of countDownEndDate to the day you want to end the count down
        var countDownEndDate = "August 5, 2024 09:00:00";

        var endDate = new Date(countDownEndDate).getTime();

        var x = setInterval(function() {

            var timeNow = new Date().getTime();

            var timeLeft = endDate - timeNow;

            var days = Math.floor(timeLeft / (1000 * 60 * 60 * 24));
            var hours = Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);

            if (days < 10) {
                days = "0" + days;
            }

            if (hours < 10) {
                hours = "0" + hours;
            }

            if (minutes < 10) {
                minutes = "0" + minutes;
            }

            if (seconds < 10) {
                seconds = "0" + seconds;
            }

            if (timeLeft > 0) {
                document.getElementById("cdD").innerHTML = days;
                document.getElementById("cdH").innerHTML = hours;
                document.getElementById("cdM").innerHTML = minutes;
                document.getElementById("cdS").innerHTML = seconds;
            }
        }, 1000);
    </script>
</body>

</html>
