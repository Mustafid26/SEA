<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Elegant Popup</title>
    <style>
        /* General reset and font */
        body, html {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            box-sizing: border-box;
        }

        /* Overlay background with opacity */
        #pdfPopup {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7); /* Dark semi-transparent background */
            z-index: 1000;
            justify-content: center;
            align-items: center;
            transition: opacity 0.5s ease, visibility 0.5s ease;
            visibility: hidden;
            opacity: 0;
        }

        /* Popup Content */
        #popupContent {
            background-color: #fff;
            padding: 50px;
            width: 90%;
            max-width: 900px;
            height: 80%;
            border-radius: 15px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            transform: scale(0.8);
            transition: transform 0.3s ease;
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        /* When Popup is visible */
        #pdfPopup.show {
            display: flex;
            visibility: visible;
            opacity: 1;
        }
        #pdfPopup.show #popupContent {
            transform: scale(1);
        }

        /* Close button */
        #closeBtn {
            position: absolute;
            top: 10px;
            right: 20px;
            background-color: transparent;
            color: #333;
            border: none;
            font-size: 24px;
            font-weight: bold;
            cursor: pointer;
            transition: color 0.3s ease;
            z-index: 2000;
        }

        #closeBtn:hover {
            color: red;
        }

        /* PDF Viewer container */
        #pdfViewer {
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f8f8f8;
            border-radius: 10px;
            overflow: hidden;
        }

        /* Navigation buttons */
        #prevBtn, #nextBtn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: #f0f0f0;
            border: none;
            padding: 10px 20px;
            font-size: 18px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        #prevBtn:hover, #nextBtn:hover {
            background-color: #ddd;
        }

        #prevBtn { left: 10px; }
        #nextBtn { right: 10px; }

        /* Smooth animation on hover */

        /* Media query for mobile responsiveness */
        @media (max-width: 768px) {
            #popupContent {
                width: 95%;
                height: 70%;
                padding: 30px;
            }

            #prevBtn, #nextBtn {
                padding: 8px 15px;
                font-size: 16px;
            }

            #closeBtn {
                font-size: 20px;
            }
        }

        /* Media query for very small screens */
        @media (max-width: 480px) {
            #popupContent {
                width: 100%;
                height: 60%;
                padding: 30px;
            }

            #prevBtn, #nextBtn {
                padding: 6px 10px;
                font-size: 14px;
            }

            #closeBtn {
                font-size: 18px;
            }
        }

        /* Media query for larger desktop screens */
        @media (min-width: 1024px) {
            #popupContent {
                width: 70%;
                max-width: 1000px;
                height: 85%;
            }
        }
        .image-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }
        .image-container img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
    <div id="pdfPopup">
        <div id="popupContent">
            <button id="closeBtn">&times;</button>
            <h1 class="text-center">Buku Panduan Serat Kartini</h1>
            <div class="image-container">
                <img src="{{asset('img/CoverPanduan.png')}}" alt="" class="img-fluid" style="width: 50%;">
            </div>
            <a href="https://drive.usercontent.google.com/u/1/uc?id=1K-_49kOZbN38jwsJobQ8catLNadA_Did&export=download" class="btn btn-primary mt-2">Unduh</a>
        </div>
    </div>    

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var pdfPopup = document.getElementById("pdfPopup");
            var closeBtn = document.getElementById("closeBtn");
            var pdfFrame = document.getElementById("pdfFrame");
            pdfPopup.classList.add('show');
    
            // Close popup smoothly
            closeBtn.addEventListener("click", function() {
                pdfPopup.classList.remove('show');
                setTimeout(function() {
                    pdfPopup.style.display = "none";
                }, 500); // Allow time for transition to finish
            });
        });
    </script>
</body>
</html>
