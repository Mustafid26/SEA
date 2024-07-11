<!DOCTYPE html>
<html lang="en">
<head>
    <title>Lihat Materi</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/favicon.png') }}">
    <style>
        .pdf-viewer {
            position: relative;
            padding-bottom: 56.25%;
            height: 0;
            overflow: hidden;
            max-width: 100%;
            background: #f0f0f0;
        }
        .pdf-viewer embed {
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
        <embed src="{{ asset('storage/powerpoint_files/' . $konten->konten) }}" type="application/pdf">
    </div>            
</body>
</html>