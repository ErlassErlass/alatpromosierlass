<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Alat Promosi 2024</title>
    <link rel="shortcut icon" href="/images/erlass.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Candal&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&display=swap" rel="stylesheet">

    <style>
        /* Bootstrap core CSS */
        @import url('https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css');

        /* Font Awesome CSS */
        @import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css');

        /* Custom Styles */
        body {
            font-family: "Poppins", sans-serif;
            background-color: white;
            overflow: hidden;
            background-size: cover;
            background-position: center;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .hero__title {
        color: #fff;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 50px;
        z-index: 1;
        }

        .cube-background {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    overflow: hidden;
    z-index: 0; /* Ensure it's behind other content */
}

.shape {
    position: absolute;
    opacity: 0; /* Start invisible */
    animation: fadeIn 12s ease-in forwards infinite; /* General animation */
}

.cube {
    width: 10px;
    height: 10px;
    border: solid 1px darkviolet;
    transform-origin: top left;
    animation: cubeAnimation 12s ease-in forwards infinite;
}

.triangle {
    width: 0;
    height: 0;
    border-left: 15px solid transparent;
    border-right: 15px solid transparent;
    border-bottom: 30px solid #e06324; /* Triangle color */
    transform-origin: top left;
    animation: triangleAnimation 12s ease-in forwards infinite;
}

.circle {
    width: 20px;
    height: 20px;
    border-radius: 50%;
    background-color: #0051f4; /* Circle color */
    animation: circleAnimation 12s ease-in forwards infinite;
}

/* Cube Animation */
@keyframes cubeAnimation {
    from {
        transform: scale(0) rotate(0deg) translate(-50%, -50%);
        opacity: 1;
    }
    to {
        transform: scale(20) rotate(960deg) translate(-50%, -50%);
        opacity: 0;
    }
}

/* Triangle Animation */
@keyframes triangleAnimation {
    from {
        transform: scale(0) rotate(0deg) translate(-50%, -50%);
        opacity: 1;
    }
    to {
        transform: scale(20) rotate(960deg) translate(-50%, -50%);
        opacity: 0;
    }
}

/* Circle Animation */
@keyframes circleAnimation {
    from {
        transform: scale(0) rotate(0deg) translate(-50%, -50%);
        opacity: 1;
    }
    to {
        transform: scale(20) rotate(960deg) translate(-50%, -50%);
        opacity: 0;
    }
}

/* Fade In Animation */
@keyframes fadeIn {
    0% {
        opacity: 0;
    }
    100% {
        opacity: 1;
    }
}

/* Positioning the Shapes */
.shape:nth-child(1) { left: 25vw; top: 80vh; animation-delay: 0s; }
.shape:nth-child(2) { left: 10vw; top: 40vh; animation-delay: 2s; }
.shape:nth-child(3) { left: 75vw; top: 50vh; animation-delay: 4s; }
.shape:nth-child(4) { left: 90vw; top: 10vh; animation-delay: 6s; }
.shape:nth-child(5) { left: 10vw; top: 85vh; animation-delay: 8s; }
.shape:nth-child(6) { left: 50vw; top: 10vh; animation-delay: 10s; }

        /* Animasi untuk elemen yang muncul */
        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(-20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
        @keyframes slideInDown {
            0% {
                transform: translateY(-50px);
                opacity: 0;
            }
            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .hero_area {
            padding: 20px;
            text-align: center;
            margin-bottom: 10px;
            position: relative;
        }

        .logo-box {
            position: relative;
            height: auto;
            margin-top: 50px;
            animation: slideInDown 0.8s ease-out;
            color: #63c0f2;
        }

        #left-image {
            position: absolute;
            left: 0; 
            top: 50%; 
            transform: translateY(-50%); 
            max-width: 20vw; /* Ukuran awal lebih kecil untuk gambar kiri */
            width: 100px; /* Ukuran tetap awal untuk gambar kiri */
        }

        #right-image {
            position: absolute;
            right: 0; 
            top: 50%; 
            transform: translateY(-50%); 
            max-width: 30vw; /* Ukuran awal lebih kecil untuk gambar kanan */
            width: 150px; /* Ukuran tetap awal untuk gambar kanan */
        }

        .logo-box img {
            height: auto;
            display: block;
        }
        .hero_area {
            padding: 20px;
            text-align: center;
            margin-bottom: 10px;
            position: relative;
        }

        .hero_area h1 {
            color: #6ba0d1;
            position: relative;
            font-family: "Candal", sans-serif;
            font-weight: bold;
            font-size: 64px;
            margin-top: 100px; /* Tambahkan jarak antara logo dan judul */
        }

        .hero_area h3 {
            color: #e06324;
            font-family: "Candal", sans-serif;
            font-weight: bold;
            font-size: 25px;
            margin-top: 10px; /* Tambahkan jarak antara judul dan subjudul */
        }

        .hero_area h1,h3 {
            animation: slideInDown 0.8s ease-out;
            text-align: center;
        }

        /* Category Section */
        .category_section {
            padding: 40px 0;
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        @keyframes slideInBounce {
            0% {
                transform: translateX(100%) scale(0.5);
                opacity: 0;
            }
            60% {
                transform: translateX(-10%) scale(1.05);
                opacity: 1;
            }
            100% {
                transform: translateX( 0) scale(1);
                opacity: 1;
            }
        }

        .box {
            display: block;
            text-align: center;
            padding: 20px;
            background-color: rgba(38,169,239,0.4699999988079071);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 20px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            margin: 10px;
            margin-top: 50px;
            animation: slideInBounce 0.6s ease forwards;
            opacity: 0;
        }

        .box:hover {
            transform: translateY(-10px) scale(1.05);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        .img-box {
            background-color: rgba(38,169,239,0.4699999988079071);
            border-radius: 20px;
            padding: 10px;
            transition: transform 0.3s ease;
        }

        .img-box:hover {
            transform: scale(1.1);
        }

        .img-box img {
            max-width: 80px;
            height: auto;
        }

        .gif-box {
            border-radius: 20px;
            padding: 10px;
            text-align: left;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .gif-box img {
            max-width: 300px;
            height: 300px;
        }

        .detail-box h5 {
            margin-top: 10px;
            color: #333;
            font-weight: 600;
            transition: color 0.3s ease;
            font-family: "Bree Serif", serif;
            font-size: 22px; /* Ukuran font lebih besar */
        }

        .box:hover .detail-box h5 {
            color: rgba(255, 255, 255, 0.8);
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .hero_area h1 {
                font-size: 1.5rem;
            }

            .hero_area h3 {
                font-size: 1.2rem;
            }

            .category_section .box {
                margin-bottom: 20px;
            }

            #left-image {
                max-width: 20vw;
            }

            #right-image {
                max-width: 25vw;
            }
        }

        @media (max-width: 480px) {
            #left-image {
                max-width: 16vw;
            }

            #right-image {
                max-width: 20vw;
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes lift {
            0% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-5px);
            }
            100% {
                transform: translateY(0);
            }
        }

        .lift {
            transition: transform 0.3s ease;
        }

        .lift:hover {
            transform: translateY(-5px);
        }

        footer {
            background-color: #63c0f2;
            padding: 20px;
            text-align: center;
            color: white;
            margin-top: auto;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .copyright p {
            font-family: "Candal", sans-serif;
            font-weight: bold;
            font-size: 24px;
            margin: 0;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .copyright p {
                font-size: 18px;
            }
        }

        @media (max-width: 480px) {
            .copyright p {
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
    <div class="cube-background">
        <div class="shape cube"></div>
        <div class="shape triangle"></div>
        <div class="shape circle"></div>
        <div class="shape cube"></div>
        <div class="shape triangle"></div>
        <div class="shape circle"></div>
    </div>
    <div class="hero_area">
        <div class="logo-box">
            <img id="right-image" src="images/coding.png" alt="Logo kanan" />
            <img id="left-image" src="images/erlass.png" alt="Logo Kiri" />
        </div>
        <h1 id="title">Alat Promosi Erlass 2024</h1>
        <h3 id="subtitle">Marketing Komunikasi Nasional Erlass Prokreatif Indonesia 2024</h3>

        <!-- Category Section -->
        <section class="category_section">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <!-- Motivational Quotes -->
                    <div class="col-sm-6 col-md-4 col-xl-2 mb-4">
                        <a href="{{ route('motivational.quotes') }}"style="text-decoration: none;">
                            <label class="box rounded">
                                <div class="img-box">
                                    <img src="gif/quotes.gif" alt="Motivational Quotes" />
                                </div>
                                <div class="detail-box">
                                    <h5>Motivational Quotes</h5>
                                </div>
                            </label>
                        </a>
                    </div>

                    <!-- Alat Promosi Internal -->
                    <div class="col-sm-6 col-md-4 col-xl-2 mb-4">
                        <a href="{{ route('alat.promosi') }}"style="text-decoration: none ;">
                            <label class="box rounded">
                                <div class="img-box">
                                    <img src="gif/promosi.gif" alt="Alat Promosi Internal" />
                                </div>
                                <div class="detail-box">
                                    <h5>Alat Promosi Internal</h5>
                                </div>
                            </label>
                        </a>
                    </div>
                    <!-- Produk -->
                    <div class="col-sm-6 col-md-4 col-xl-2 mb-4">
                        <a href="{{ route('produk.index') }}"style="text-decoration: none;">
                            <label class="box rounded">
                                <div class="img-box">
                                    <img src="gif/produk.gif" alt="Produk" />
                                </div>
                                <div class="detail-box">
                                    <h5>Product</h5>
                                </div>
                            </label>
                        </a>
                    </div>

                    <!-- Design Corner -->
                    <div class="col-sm-6 col-md-4 col-xl-2 mb-4">
                        <a href="{{ route('design.corner') }}"style="text-decoration: none;">
                            <label class="box rounded">
                                <div class="img-box">
                                    <img src="gif/idea.gif" alt="Design Corner" />
                                </div>
                                <div class="detail-box">
                                    <h5>Design Corner</h5>
                                </div>
                            </label>
                        </a>
                    </div>

                    <!-- Promotion Video -->
                    <div class="col-sm-6 col-md-4 col-xl-2 mb-4">
                        <a href="{{ route('promotion.videos') }}"style="text-decoration: none;">
                            <label class="box rounded">
                                <div class="img-box">
                                    <img src="gif/film.gif" alt="Promotion Video" />
                                </div>
                                <div class="detail-box">
                                    <h5>Promotion Video</h5>
                                </div>
                            </label>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <footer>
        <div class="copyright">
            <p> 2024 All Rights Reserved By Erlass Prokreatif Indonesia</p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const title = document.getElementById('title');
            const subtitle = document.getElementById('subtitle');

            wrapLetters(title);
            wrapLetters(subtitle);
        });

        function wrapLetters(element) {
            const text = element.innerText;
            element.innerHTML = text.split(' ').map(word => {
                return word.split('').map(letter => `<span>${letter}</span>`).join('') + ' '; // Preserve spaces
            }).join(''); // Maintain spaces between words
        }

        // Function to add the lift class
        function addLiftClass(event) {
            event.target.classList.add('lift');
        }

        // Function to remove the lift class
        function removeLiftClass(event) {
            event.target.classList.remove('lift');
        }

        // Select the elements you want to apply the effect to
        const title = document.querySelector('.hero_area h1');
        const subtitle = document.querySelector('.hero_area h3');

        // Add event listeners for mouse enter and leave
        title.addEventListener('mouseenter', addLiftClass);
        title.addEventListener('mouseleave', removeLiftClass);
        
        subtitle.addEventListener('mouseenter', addLiftClass);
        subtitle.addEventListener('mouseleave', removeLiftClass);
    </script>
</body>
</html>