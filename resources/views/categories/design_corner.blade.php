<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Design Corner</title>
    <link rel="shortcut icon" href="/images/erlass.png">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Candal&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&display=swap" rel="stylesheet">
    <style>
        :root {
            --background-color: #f0f8ff;
            --header-bg-color: rgba(77, 204, 204, 1);
            --card-bg-color: rgba(179, 229, 252, 0.4);
            --text-color: #fff;
            --hover-color: #36a8a8;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: var(--background-color);
            background-image: url('images/background-home.png');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            margin: 0;
            padding: 0;
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            0% { opacity: 0; }
            100% { opacity: 1; }
        }

        .header h1 {
            font-size: 40px;
            margin: 0;
        }

        .search-container input {
            width: 100%; 
            max-width: 150px; 
            padding: 10px; 
            border: 2px solid #4dcccc; 
            border-radius: 5px; 
            font-size: 16px; 
            transition: border-color 0.3s ease; 
            justify-content: center; 
        }

        .search-container input:focus {
            outline: none; 
            border-color: #36a8a8; 
            box-shadow: 0 0 5px rgba(54, 168, 168, 0.5); 
        }

        .search-container input::placeholder {
            color: #a0a0a0; 
            opacity: 1; 
        }

        .search-container {
            margin: 20px auto;
            text-align: center;
        }

        .filter-buttons {
            display: flex;
            justify-content: center;
            margin: 20px 0;
        }

        .filter-buttons button {
            background-color: #4db6ac;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            margin: 0 10px;
            cursor: pointer;
            transition: background-color 0.3s;
            font-size: 16px;
            font-family: "Bree Serif", serif;
        }

        .filter-buttons button:hover {
            background-color: #36a8a8;
        }

        .filter-select {
            margin: 0 10px;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #4db6ac;
            font-size: 16px;
            display: none; 
            font-family: "Bree Serif", serif;
        }

        .card {
            display: flex;
            flex-wrap: wrap; /* Allow items to wrap */
            justify-content: flex-start; /* Align items to the start */
            margin: 20px 0;
        }
        .card-images {
            display: flex;
            flex-wrap: wrap; /* Allow items to wrap */
            justify-content: flex-start; /* Align items to the start */
            margin: 20px 0;
        }

        .media-item {
    background-color: var(--card-bg-color);
    border-radius: 10px;
    width: calc(15% - 30px); /* Default to 4 items per row */
    margin: 15px;
    padding: 10px; /* Reduced padding */
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    animation: slideUp 0.8s ease-in-out;
    opacity: 1;
    visibility: visible;
    overflow: hidden; /* Prevent overflow */
    word-wrap: break-word; /* Allow long words to break */
}

.media-item-images {
    background-color: var(--card-bg-color);
    border-radius: 10px;
    width: calc(25% - 30px); /* Default to 4 items per row */
    margin: 15px;
    padding: 10px; /* Reduced padding */
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    animation: slideUp 0.8s ease-in-out;
    opacity: 1;
    visibility: visible;
    overflow: hidden; /* Prevent overflow */
    word-wrap: break-word; /* Allow long words to break */
}

        /* Responsive adjustments */
        @media (max-width: 1200px) {
            .media-item {
                width: calc(33.33% - 30px); /* 3 items per row */
            }
        }

        @media (max-width: 900px) {
            .media-item {
                width: calc(50% - 30px); /* 2 items per row */
            }
        }

        @media (max-width: 600px) {
            .media-item {
                width: calc(100% - 30px); /* 1 item per row */
            }
        }
        @media (max-width: 1200px) {
            .media-item-images {
                width: calc(33.33% - 30px); /* 3 items per row */
            }
        }

        @media (max-width: 900px) {
            .media-item-images {
                width: calc(50% - 30px); /* 2 items per row */
            }
        }

        @media (max-width: 600px) {
            .media-item-images {
                width: calc(100% - 30px); /* 1 item per row */
            }
        }

        .media-item:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.3);
        }
        .media-item-images:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.3);
        }

        .media-item img {
            width: 100%;
            height: 150px; /* Reduced height */
            object-fit: contain;
            cursor: pointer;
            border: 2px solid #ffffff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
        }
        .media-item-images img {
            width: 100%;
            height: 150px; /* Reduced height */
            object-fit: contain;
            cursor: pointer;
            border: 2px solid #ffffff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
        }

        .media-item .name,
.media-item-images .name {
    font-size: 18px; /* Reduced font size */
    font-weight: bold;
    margin: 5px 0 3px; /* Adjusted margins */
    color: #222;
    font-family: "Bree Serif", serif;
    overflow: hidden; /* Prevent overflow */
    white-space: normal; /* Allow text to wrap */
}

.media-item .description,
.media-item-images .description {
    font-size: 18px; /* Reduced font size */
    color: #333;
    margin-bottom: 5px; /* Adjusted margin */
    font-family: "Bree Serif", serif;
    overflow: hidden; /* Prevent overflow */
    white-space: normal; /* Allow text to wrap */
}

        .media-footer {
            display: flex;
            justify-content: end;
            align-items: center;
            margin-top: 5px; /* Adjusted margin */
            height: 25px;
        }
        .media-footer-images {
            display: flex;
            justify-content: end;
            align-items: center;
            margin-top: 5px; /* Adjusted margin */
            height: 25px;
        }

        .download-icon {
            color: var(--text-color);
            font-size: 16px; /* Reduced font size */
            text-decoration: none;
            transition: color 0.3s;
        }

        .close {
            position: absolute;
            top: 15px;
            right: 35px;
            color: #fff;
            font-size: 40px;
            font-weight: bold;
            transition: 0.3s;
            cursor: pointer;
        }

        .close:hover {
            color: #bbb;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.9);
            overflow: auto;
        }

        .modal-content {
            display: block;
            margin: auto;
            max-width: 90%;
            max-height: 90vh;
            object-fit: contain;
        }

        @media only screen and (max-width: 700px) {
            .modal-content {
                width: 90%;
            }
        }

        .header {
            color: white; 
            width: 90%;
            max-width: 600px;
            height: auto;
            background: #4db6ac;
            border: 1px solid rgba(0, 0, 0, 1);
            border-radius: 45px;
            text-align: center;
            padding: 20px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            font-family: "Candal", sans-serif;
            font-weight: 400;
            font-size: 2rem;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 20px auto;
            animation: slideInDown 0.8s ease-out;
            text-shadow: 
            1px 1px 0 rgba(0, 0, 0, 1),
            -1px -1px 0 rgba(0, 0, 0, 1),
            1px -1px 0 rgba(0, 0, 0, 1),
            -1px 1px 0 rgba(0, 0, 0, 1),
            0 1px 0 rgba(0, 0, 0, 1),
            0 -1px 0 rgba(0, 0, 0, 1);
        }

        .tombol-back {
            position: absolute;
            top: 20px;
            left: 20px;
            z-index: 100;
            animation: slideIn 1s ease-in;
        }

        .tombol-back a {
            display: inline-block;
            background-color: #4dcccc;
            border-radius: 50%;
            padding: 10px;
            transition: transform 0.2s ease, background-color 0.3s ease;
        }

        .tombol-back a:hover {
            background-color: #36a8a8;
            transform: scale(1.1);
        }

        .tombol-back img {
            width: 50px;
            height: auto;
        }

        @media only screen and (max-width: 600px) {
            .header {
                font-size: 1.5rem;
                padding: 15px;
            }

            .tombol-back img {
                width: 40px;
            }
        }

        .media-badge {
            position: absolute;
            top: 10px;
            left: 10px;
            background-color: rgba(255, 165, 0, 0.8);
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 12px;
            font-weight: bold;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
            box-shadow: 0 2px 5px rgba(0,  0, 0, 0.3);
            transition: transform 0.3s, opacity 0.3s;
            opacity: 0;
            visibility: hidden;
        }

        .media-item:hover .media-badge {
            opacity: 1;
            visibility: visible;
            transform: scale(1.1);
        }

        @keyframes slideUp {
            0% {
                transform: translateY(50px);
                opacity: 0;
            }
            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(-100%);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        /* New styles for document separation */
        .document-section {
            margin: 20px 0;
        }

        .document-type {
            font-family: "Bree Serif", serif;
            font-weight: bold; 
            font-size: 30px;
            margin: 10px 17px;
        }
        .info {
            font-family: "Bree Serif", serif;
            font-size: 20px;
            color: #333; /* Warna teks deskripsi lebih gelap */
        }
    </style>
</head>
<body>
    <header>
        <div class="tombol-back">
            <a href="/dashboard-user">
                <img src="images/back.png" alt="Tombol Back">
            </a>
        </div>
        <div class="header">
            <h1>Design Corner</h1>
        </div>
        <div class="search-container">
            <input type="text" id="searchInput" placeholder="Search..." onkeyup="filterDocuments()">
            <select id="fileFormat" class="filter-select" onchange="filterDocuments()">
                <option value="">All Formats</option>
                <option value="pdf">PDF</option>
                <option value="docx">DOCX</option>
                <option value="ppt">PPT</option>
                <option value="xls">XLS</option>
            </select>
        </div>
        <div class="filter-buttons">
            <button onclick="showImages()">Images</button>
            <button onclick="showDocuments()">Documents</button>
        </div>
    </header>

    <main>
        <div class="card-images" id="imagesCard">
            @if(isset($media) && $media->count())
                @foreach($media as $item)
                @if($item->image)
                <div class="media-item-images">
                    @if($item->is_new)
                        <div class="media-badge">New</div>
                    @endif
                    <img src="{{ $item->image }}" alt="Image" onclick="openModal('{{ $item->image }}', 'image')">
                    <p class="name">{{ $item->designer_name }}</p>
                    <p class="description">{{ $item->description }}</p>
                    <div class="media-footer-images">
                        <a href="{{ $item->image }}" download>
                            <img style="width: 24px; height: 24px; border: 0px;" src="../gif/download.gif" alt="Download" class="download-gif">
                        </a>
                    </div>
                </div>
                @endif
                @endforeach
            @else
                <p class="info">Tidak ada media yang tersedia.</p>
            @endif
        </div>
    
        <div class="document-section" id="documentsCard" style="display: none;">
            <div class="document-type">Word Documents (DOC/DOCX)</div>
            <div class="card-images">
                @if(isset($media) && $media->count())
                    @foreach($media as $item)
                    @if($item->document && (pathinfo($item->document, PATHINFO_EXTENSION) == 'doc' || pathinfo($item->document, PATHINFO_EXTENSION) == 'docx'))
                    <div class="media-item" data-format="{{ strtolower(pathinfo($item->document, PATHINFO_EXTENSION)) }}">
                        @php
                            $icon = 'images/docx.png';
                        @endphp
                        <img src="{{ $icon }}" alt="Document Icon" style="cursor: pointer; height: 50px; width: 50px; object-fit: cover;" onclick="openDocModal('{{ $item->document }}')">
                        <p class="name">{{ $item->designer_name }}</p>
                        <p class="description">{{ $item->description }}</p>
                        <div class="media-footer">
                            <a href="{{ $item->document }}" download>
                                <img style="width: 24px; height: 24px; border: 0px;" src="../gif/download.gif" alt="Download" class="download-gif">
                            </a>
                        </div>
                    </div>
                    @endif
                    @endforeach
                @else
                    <p class="info">Tidak ada dokumen yang tersedia.</p>
                @endif
            </div>

            <div class="document-type">PDF Documents</div>
            <div class="card">
                @if(isset($media) && $media->count())
                    @foreach($media as $item)
                    @if($item->document && pathinfo($item->document, PATHINFO_EXTENSION) == 'pdf')
                    <div class="media-item" data-format="pdf">
                        <img src="images/pdf.png" alt="Document Icon" style="cursor: pointer; height: 50px; width: 50px; object-fit: cover;" onclick="openDocModal('{{ $item->document }}')">
                        <p class="name">{{ $item->designer_name }}</p>
                        <p class="description">{{ $item->description }}</p>
                        <div class="media-footer">
                            <a href="{{ $item->document }}" download>
                                <img style="width: 24px; height: 24px; border: 0px;" src="../gif/download.gif" alt="Download" class="download-gif">
                            </a>
                        </div>
                    </div>
                    @endif
                    @endforeach
                @else
                    <p class="info">Tidak ada dokumen yang tersedia.</p>
                @endif
            </div>

            <div class="document-type">Other Documents (PPT/XLS)</div>
            <div class="card">
                @if(isset($media) && $media->count())
                    @foreach($media as $item)
                    @if($item->document && (pathinfo($item->document, PATHINFO_EXTENSION) == 'ppt' || pathinfo($item->document, PATHINFO_EXTENSION) == 'xls' || pathinfo($item->document, PATHINFO_EXTENSION) == 'xlsx'))
                    <div class="media-item" data-format="{{ strtolower(pathinfo($item->document, PATHINFO_EXTENSION)) }}">
                        @php
                            $extension = strtolower(pathinfo($item->document, PATHINFO_EXTENSION));
                            $icon = '';
                            switch ($extension) {
                                case 'ppt':
                                case 'pptx':
                                    $icon = 'images/ppt.png';
                                    break;
                                case 'xls':
                                case 'xlsx':
                                    $icon = 'images/xls.png';
                                    break;
                            }
                        @endphp
                        <img src="{{ $icon }}" alt="Document Icon" style="cursor: pointer; height: 50px; width: 50px; object-fit: cover;" onclick="openDocModal('{{ $item->document }}')">
                        <p class="name">{{ $item->designer_name }}</p>
                        <p class="description">{{ $item->description }}</p>
                        <div class="media-footer">
                            <a href="{{ $item->document }}" download>
                                <img style="width: 24px; height: 24px; border: 0px;" src="../gif/download.gif" alt="Download" class="download-gif">
                            </a>
                        </div>
                    </div>
                    @endif
                    @endforeach
                @else
                    <p class="info">Tidak ada dokumen yang tersedia.</p>
                @endif
            </div>
        </div>
    </main>

    <div id="myModal" class="modal">
        <span class="close" onclick="closeModal()">&times;</span>
        <img class="modal-content" id="imgModal">
    </div>

    <script>
        let modalImg = document.getElementById("imgModal");

        function filterMediaItems() {
            const input = document.getElementById("searchInput");
            const filter = input.value.toLowerCase();
            const mediaItems = document.querySelectorAll('.media-item');

            mediaItems.forEach(item => {
                const title = item.querySelector('.name').textContent.toLowerCase();
                const description = item.querySelector('.description').textContent.toLowerCase();
                
                if (title.includes(filter) || description.includes(filter)) {
                    item.style.display = ""; // Show item
                } else {
                    item.style.display = "none"; // Hide item
                }
            });
        }

        function filterDocuments() {
    const searchInput = document.getElementById("searchInput").value.toLowerCase();
    const selectedFormat = document.getElementById("fileFormat").value;
    const mediaItems = document.querySelectorAll('#documentsCard .media-item');

    mediaItems.forEach(item => {
        const title = item.querySelector('.name').textContent.toLowerCase();
        const format = item.getAttribute('data-format');

        // Check if the title includes the search input and if the format matches
        const matchesSearch = title.includes(searchInput);
        const matchesFormat = selectedFormat === "" || format === selectedFormat;

        if (matchesSearch && matchesFormat) {
            item.style.display = ""; // Show item
        } else {
            item.style.display = "none"; // Hide item
        }
    });
}

// Call this function when the search input changes
document.getElementById("searchInput").addEventListener("keyup", filterDocuments);

// Call this function when the format dropdown changes
document.getElementById("fileFormat").addEventListener("change", filterDocuments);

        function showImages() {
            document.getElementById('imagesCard').style.display = 'flex';
            document.getElementById('documentsCard').style.display = 'none'; // Hide documents
            document.getElementById('fileFormat').style.display = 'none'; // Hide format dropdown
            document.getElementById('searchInput').value = ''; // Reset search input
            filterMediaItems(); // Show all images
        }

        function showDocuments() {
            document.getElementById('imagesCard').style.display = 'none'; // Hide images
            document.getElementById('documentsCard').style.display = 'block'; // Show documents
            document.getElementById('fileFormat').style.display = 'inline-block'; // Show format dropdown
            document.getElementById('searchInput').value = ''; // Reset search input
            filterMediaItems(); // Show all documents
            filterDocumentsByFormat(); // Reset document filter
        }

        function openModal(imageSrc) {
            const modal = document.getElementById("myModal");
            modal.style.display = "flex";
            modalImg.src = imageSrc;
            
            modalImg.onload = function() {
                adjustImageSize(this);
            }
        }

        function adjustImageSize(img) {
            const windowWidth = window.innerWidth;
            const windowHeight = window.innerHeight;
            const imageRatio = img.naturalWidth / img.naturalHeight;
            const windowRatio = windowWidth / windowHeight;

            if (imageRatio > windowRatio) {
                if (img.naturalWidth > windowWidth * 0.9) {
                    img.style.width = '90%';
                    img.style.height = 'auto';
                } else {
                    img.style.width = 'auto';
                    img.style.height = 'auto';
                }
            } else {
                if (img.naturalHeight > windowHeight * 0.9) {
                    img.style.height = '90vh';
                    img.style.width = 'auto';
                } else {
                    img.style.width = 'auto';
                    img.style.height = 'auto';
                }
            }
        }

        function closeModal() {
            const modal = document.getElementById("myModal");
            modal.style.display = "none";
        }

        function zoomImage(event, zoomIn = true) {
            const factor = zoomIn ? 1.1 : 0.9;
            
            const newWidth = modalImg.width * factor;
            const newHeight = modalImg.height * factor;
            
            modalImg.style.width = newWidth + 'px';
            modalImg.style.height = newHeight + 'px';
        }

        document.getElementById("myModal").addEventListener('wheel', function(e) {
            e.preventDefault();
            if (e.deltaY < 0) {
                zoomImage(e, true);
            } else {
                zoomImage(e, false);
            }
        });

        window.addEventListener('resize', function() {
            if (modalImg.src) {
                adjustImageSize(modalImg);
            }
        });

        // Call showImages on page load to display both cards
        window.onload = function() {
            showImages();
        };
    </script>
</body>
</html>