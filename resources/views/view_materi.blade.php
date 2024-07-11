<!DOCTYPE html>
<html lang="en">
<head>
    <title>Lihat Materi</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/favicon.png') }}">
    <style>
        .pdf-viewer {
            position: relative;
            height: 100vh;
            width: 100vw;
            overflow: hidden;
            background: #f0f0f0;
        }
        .pdf-viewer iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
        }
    </style>
</head>
<body style="height: 100%; width: 100%; overflow: hidden; margin:0px; background-color: rgb(82, 86, 89);">
    <div class="pdf-viewer">
        <iframe src="{{ asset('storage/powerpoint_files/' . $konten->konten) }}" type="application/pdf"></iframe>
    </div>            
</body>
</html>
