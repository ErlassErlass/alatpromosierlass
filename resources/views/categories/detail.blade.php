<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk</title>
    <link rel="shortcut icon" href="/images/erlass.png">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Candal&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js" integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
        :root {
            --background-color: #f0f8ff;
            --header-bg-color: rgba(77, 204, 204, 1);
            --card-bg-color: rgba(179, 229, 252, 0.4);
            --text-color: #333;
            --hover-color: #36a8a8;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: var(--background-color);
            background-image: url('/images/background-home.png');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            margin: 0;
            padding: 0;
            animation: fadeIn 1s ease-in-out;
        }

        .container {
            text-align: center;
            padding: 20px;
        }

        .tombol-back {
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 100;
            animation: slideIn 1s ease-in;
        }

        .tombol-back a {
            display: inline-block;
            background-color: #4dcccc;
            border-radius: 50%;
            padding: 15px;
            transition: transform 0.2s ease, background-color 0.3s ease;
        }

        .tombol-back a:hover {
            background-color: #36a8a8;
            transform: scale(1.1);
        }

        .tombol-back img {
            width: 75px;
            height: auto;
        }

        .header {
            width: 100%;
            max-width: 800px; /* Maksimal lebar header */
            height: auto;
            background: var(--header-bg-color, #4fc3f7);
            border-radius: 45px;
            border: 1px solid rgba(0, 0, 0, 1);
            text-align: center;
            padding: 10px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            margin: 20px auto 30px;
            font-family: "Candal", sans-serif;
            font-weight: 400;
            color: white;
            text-shadow: 
            1px 1px 0 rgba(0, 0, 0, 1),
            -1px -1px 0 rgba(0, 0, 0, 1),
            1px -1px 0 rgba(0, 0, 0, 1),
            -1px 1px 0 rgba(0, 0, 0, 1);
            margin-bottom: 20px;
            position: relative;
        }

        .content {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 50px;
            position: relative;
        }

        .text-container {
            display : flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            background-color: var(--card-bg-color);
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            max-width: 1200px;
            width: 100%; /* Memastikan lebar 100% untuk responsivitas */
            flex-wrap: wrap;
            position: relative;
        }

        .text-container img {
            max-width: 100%; /* Memastikan gambar responsif */
            height: auto;
            border-radius: 10px;
            margin: 10px 0; /* Menambahkan margin untuk jarak */
        }

        .text-container div {
            flex: 1;
            min-width: 300px;
            word-wrap: break-word;
            margin: 0;
            text-align: left;
        }

        .text-container p {
            font-size: 20px;
            line-height: 1.8;
            color: var(--text-color);
            margin-top: 10px;
            font-family: "Bree Serif", serif;
        }

        .download-gif {
            position: absolute;
            bottom: 20px;
            right: 20px;
            width: 50px;
            height: auto;
            cursor: pointer;
        }

        @keyframes slideIn {
            from {
                transform: translateX(-100px);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        /* Media Queries untuk responsivitas */
        @media (max-width: 768px) {
            .header {
                font-size: 24px; /* Mengubah ukuran font untuk layar kecil */
            }

            .text-container {
                flex-direction: column; /* Mengubah arah flex untuk layar kecil */
            }

            .text-container img {
                margin: 0; /* Menghapus margin untuk gambar di layar kecil */
            }

            .download-gif {
                width: 40px; /* Mengubah ukuran gambar download di layar kecil */
            }
        }

        @media (max-width: 480px) {
            .header {
                font-size: 20px; /* Ukuran font lebih kecil untuk layar sangat kecil */
            }

            .text-container p {
                font-size: 18px; /* Mengubah ukuran font paragraf */
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="tombol-back">
            <a href="/produk">
                <img src="/images/back.png" alt="Tombol Back">
            </a>
        </div>

        <div class="content">
            <div class="text-container" id="text-container">
                <h1 class="header">{{ $media->title }}</h1>
                <img alt="{{ $media->title }}" src="{{ asset($media->image) }}" />
                <div>
                    <p>
                        {{ $media->description }}
                        <br/>
                    </p>
                </div>
                <img onclick="downloadContent()" src="../gif/download.gif" alt="Download" class="download-gif">
            </div>
        </div>
    </div>

    <script>
function downloadContent() {
    const content = document.querySelector('.text-container');

    const downloadImage = document.querySelector('.download-gif');
    downloadImage.style.display = 'none';

    const originalBodyBackgroundColor = document.body.style.backgroundColor;
    document.body.style.backgroundColor = getComputedStyle(document.documentElement).getPropertyValue('--background-color');

    html2canvas(content, { willReadFrequently: true }).then(canvas => {
        const link = document.createElement('a');
        link.href = canvas.toDataURL('image/png');
        link.download = 'media_detail.png';
        link.click();

        document.body.style.backgroundColor = originalBodyBackgroundColor;
        downloadImage.style.display = 'block';
    }).catch(err => {
        console.error('Terjadi kesalahan saat mendownload:', err);
        downloadImage.style.display = 'block';
    });
}
    </script>
</body>
</html>