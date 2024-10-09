<!DOCTYPE html>
<html lang="en">

<head>
    <title>Lihat Materi</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/favicon.png') }}">
    <style>
        .viewer {
            position: relative;
            height: 100vh;
            width: 100vw;
            overflow: hidden;
            background: #f0f0f0;
        }

        .viewer iframe {
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
    <div class="viewer">
        <!-- Conditional Rendering for PDF and PPT/PPTX -->
        @if (pathinfo($konten->konten, PATHINFO_EXTENSION) == 'pdf')
            <!-- PDF Viewer -->
            <iframe src="{{ asset('storage/materi/' . $konten->konten) }}" type="application/pdf"></iframe>
        @elseif(in_array(pathinfo($konten->konten, PATHINFO_EXTENSION), ['ppt', 'pptx']))
            <!-- PPT/PPTX Viewer using Google Docs Viewer -->
            <iframe
                src="https://docs.google.com/gview?url={{ asset('storage/powerpoint_files/' . $konten->konten) }}&embedded=true"
                frameborder="0">
            </iframe>
        @else
            <p>File format not supported for viewing.</p>
        @endif
    </div>
</body>

</html>
