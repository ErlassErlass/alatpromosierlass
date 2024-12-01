@extends('layouts.petugas-main')

@section('title', 'Daftar Media')
<style>
    .pagination-wrapper {
        margin-top: 0px; /* Jarak atas untuk pagination */
    }
    .category-button {
        margin-right: 10px;
    }
</style>

@section('content')
<main class="app-main"> 
    <div class="app-content-header"> 
        <div class="container-fluid"> 
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Daftar Media</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Daftar Media</li>
                    </ol>
                </div>
            </div> 
        </div> 
    </div> 

    <div class="app-content"> 
        <div class="container-fluid">
            <!-- Navigation Buttons for Categories -->
            <div class="mb-3">
                @foreach (['motivational_quotes', 'alat_promosi_internal', 'design_corner', 'promotion_videos', 'produk'] as $category)
                    <button class="btn btn-primary category-button" onclick="showCategory('{{ $category }}')">{{ ucfirst(str_replace('_', ' ', $category)) }}</button>
                @endforeach
            </div>

            @foreach (['motivational_quotes', 'alat_promosi_internal', 'design_corner', 'promotion_videos', 'produk'] as $category)
            <div class="card mb-4 category-card" data-category="{{ $category }}" id="{{ $category }}-card" style="display: none;">
                <div class="card-header">
                    <h3 class="card-title">{{ ucfirst(str_replace('_', ' ', $category)) }}</h3>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap" id="{{ $category }}-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Kategori</th>
                                @if ($category === 'motivational_quotes')
                                    <th>Gambar</th>
                                    <th>Quotes</th>
                                    <th>Tanggal Upload</th>
                                @elseif ($category === 'alat_promosi_internal')
                                    <th>Judul</th>
                                    <th>Deskripsi</th>
                                    <th>Gambar</th>
                                    <th>Tanggal Upload</th>
                                @elseif ($category === 'design_corner')
                                    <th>Jenis Upload</th> <!-- New column for upload type -->
                                    <th>Judul</th>
                                    <th>Deskripsi</th>
                                    <th>Tanggal Upload</th>
                                    <th>Media</th>
                                @elseif ($category === 'promotion_videos')
                                    <th>Judul</th>
                                    <th>Thumbnail</th>
                                    <th>Tanggal Upload</th>
                                @elseif ($category === 'produk')
                                    <th>Judul</th>
                                    <th>Deskripsi</th>
                                    <th>Gambar</th>
                                    <th>Tanggal Upload</th>
                                @endif
                                <th>Aksi</th>
                            </tr>
                        </thead>            
                        <tbody>
                            @foreach ($mediaByCategory[$category] as $item)
                            <tr data-title="{{ strtolower($item->title) }}" 
                                data-description="{{ strtolower($item->description) }}" 
                                data-upload-date="{{ $item->upload_date }}"
                                data-media-type="{{ $item->image ? 'image' : 'document' }}">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ ucfirst(str_replace('_', ' ', $item->category)) }}</td>
                                @if ($item->category === 'motivational_quotes')
                                    <td>
                                        @if ($item->image)
                                            <img src="{{ $item->image }}" alt="Gambar Media" style="width: 100px; height: 100px;">
                                        @endif
 </td>
                                    <td>{{ Str::limit($item->quote, 50) }}</td>
                                    <td>{{ $item->upload_date }}</td>
                                @elseif ($item->category === 'alat_promosi_internal')
                                    <td>{{ $item->title }}</td>
                                    <td>{{ Str::limit($item->description, 50) }}</td>
                                    <td>
                                        @if ($item->image)
                                            <img src="{{ $item->image }}" alt="Gambar Media" style="width: 100px; height: 100px;">
                                        @endif
                                    </td>
                                    <td>{{ $item->upload_date }}</td>
                                @elseif ($item->category === 'design_corner')
                                    <td>{{ $item->image ? 'Gambar' : 'Dokumen' }}</td>
                                    <td>{{ $item->designer_name }}</td>
                                    <td>{{ Str::limit($item->description, 50) }}</td>
                                    <td>{{ $item->upload_date }}</td>
                                    <td>
                                        @if ($item->image)
                                            <img src="{{ $item->image }}" alt="Gambar Media" style="width: 100px; height: 100px;">
                                        @elseif ($item->document)
                                            @php
                                                $extension = strtolower(pathinfo($item->document, PATHINFO_EXTENSION));
                                                $icon = '';
                                                switch ($extension) {
                                                    case 'pdf':
                                                        $icon = asset('images/pdf.png');
                                                        break;
                                                    case 'doc':
                                                    case 'docx':
                                                        $icon = asset('images/docx.png');
                                                        break;
                                                    case 'ppt':
                                                    case 'pptx':
                                                        $icon = asset('images/ppt.png');
                                                        break;
                                                    case 'xls':
                                                    case 'xlsx':
                                                        $icon = asset('images/xls.png');
                                                        break;
                                                    default:
                                                        $icon = asset('images/document.png'); // Default icon for unknown types
                                                }
                                            @endphp
                                            <img src="{{ $icon }}" alt="Ikon Dokumen" style="width: 50px; height: 50px;">
                                        @endif
                                    </td>
                                @elseif ($item->category === 'promotion_videos')
                                    <td>{{ $item->video_title }}</td>
                                    <td>
                                        @if ($item->thumbnail)
                                            <img src="{{ $item->thumbnail }}" alt="Gambar Thumbnail" style="width: 100px; height: 100px;">
                                        @endif
                                    </td>
                                    <td>{{ $item->upload_date }}</td>
                                @elseif ($item->category === 'produk')
                                    <td>{{ $item->title }}</td>
                                    <td>{{ Str::limit($item->description, 50) }}</td>
                                    <td>
                                        @if ($item->image)
                                            <img src="{{ $item->image }}" alt="Gambar Media" style="width: 100px; height: 100px;">
                                        @endif
                                    </td>
                                    <td>{{ $item->upload_date }}</td>
                                @endif
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary" onclick="openEditModal({{ $item->id }}, '{{ $item->category }}', '{{ $item->image ? 'image' : 'document' }}')">Edit</button>
                                    <button type="button" class="btn btn-sm btn-danger" onclick="openDeleteModal({{ $item->id }})">Hapus</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="pagination-wrapper">
                        <button class="btn btn-secondary" onclick="changePage('{{ $category }}', -1)">Previous</button>
                        <button class="btn btn-secondary" onclick="changePage('{{ $category }}', 1)">Next</button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</main>
<!-- Modal Edit -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editForm" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Media</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="editModalBody">
                    <!-- Dynamic form content will be injected here -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Delete -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="deleteForm" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Hapus Media</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus media ini?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function showCategory(category) {
    const categories = ['motivational_quotes', 'alat_promosi_internal', 'design_corner', 'promotion_videos', 'produk'];
    categories.forEach(cat => {
        const card = document.getElementById(`${cat}-card`);
        if (cat === category) {
            card.style.display = 'block'; // Show the selected category
        } else {
            card.style.display = 'none'; // Hide other categories
        }
    });
}

// Initialize to show the motivational quotes category by default
document.addEventListener('DOMContentLoaded', () => {
    showCategory('motivational_quotes'); // This ensures the motivational quotes table is shown first
});
    
const itemsPerPage = 5; // Set the number of items per page

function changePage(category, direction) {
    const table = document.getElementById(`${category}-table`);
    const rows = table.querySelectorAll('tbody tr');

    // Check if rows exist
    if (rows.length === 0) {
        console.warn(`No rows found for category: ${category}`);
        return; // Exit the function if there are no rows
    }

    let currentPage = parseInt(localStorage.getItem(`${category}-currentPage`)) || 0; // Get current page from local storage
    const totalPages = Math.ceil(rows.length / itemsPerPage); // Calculate total pages

    // Update current page based on direction
    currentPage += direction;

    // Ensure current page is within bounds
    if (currentPage < 0) currentPage = 0;
    if (currentPage >= totalPages) currentPage = totalPages - 1;

    // Hide all rows
    rows.forEach(row => {
        row.style.display = 'none'; // Hide all rows
    });

    // Show rows for the current page
    const start = currentPage * itemsPerPage;
    const end = start + itemsPerPage;
    for (let i = start; i < end && i < rows.length; i++) {
        rows[i].style.display = ''; // Show rows for the current page
    }

    // Update the current page in local storage
    localStorage.setItem(`${category}-currentPage`, currentPage);
}

// Initialize pagination on page load
document.addEventListener('DOMContentLoaded', () => {
    const categories = ['motivational_quotes', 'alat_promosi_internal', 'design_corner', 'promotion_videos', 'produk'];
    categories.forEach(category => {
        changePage(category, 0); // Show the first page or the stored page
    });
});

function openEditModal(id, category, mediaType) {
    const form = document.getElementById('editForm');
    form.action = `/petugas/media/${id}`; // Update action URL
    
    const today = new Date().toISOString().split('T')[0];
    
    let formContent = '';
    if (category === 'motivational_quotes') {
        formContent = `
            <div class="form-group">
                <label for="image">Upload Gambar</label>
                <input type="file" name="image" accept="image/*" class="form-control mb-2">
            </div>
            <div class="form-group">
                <label for="quote">Quotes</label>
                <textarea name="quote" class="form-control" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="upload_date">Tanggal Upload</label>
                <input type="date" name="upload_date" class="form-control mb-2" value="${today}">
            </div>
        `;
    } else if (category === 'alat_promosi_internal') {
        formContent = `
            <div class="form-group">
                <label for="title">Judul</label>
                <input type="text" name="title" class="form-control mb-2" placeholder="Judul">
            </div>
            <div class="form-group">
                <label for="description">Deskripsi</label>
                <textarea name="description" class="form-control mb-2" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="image">Upload Gambar</label>
                <input type="file" name="image" accept="image/*" class="form-control mb-2">
            </div>
            <div class="form-group">
                <label for="upload_date">Tanggal Upload</label>
                <input type="date" name="upload_date" class="form-control mb-2" value="${today}">
            </div>
        `;
    } else if (category === 'design_corner') {
        if (mediaType === 'image') {
            formContent = `
                <div class="form-group">
                    <label for="designer_name">Judul</label>
                    <input type="text" id="designer_name" name="designer_name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="description">Deskripsi</label>
                    <textarea id="description" name="description" class="form-control" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label for="upload_date">Tanggal Upload</label>
                    <input type="date" id="upload_date" name="upload_date" class="form-control" value="${today}" required>
                </div>
                <div class="form-group">
                    <label for="image">Upload Gambar</label>
                    <input type="file" id="image" name="image" class="form-control " accept="image/*" required onchange="previewImage(event)">
                    <img id="imagePreview" src="#" alt="Pratinjau Gambar" style="display:none; width: 200px; margin-top: 10px;"/>
                </div>
            `;
        } else if (mediaType === 'document') {
            formContent = `
                <div class="form-group">
                    <label for="designer_name">Judul</label>
                    <input type="text" id="designer_name" name="designer_name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="description">Deskripsi</label>
                    <textarea id="description" name="description" class="form-control" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label for="upload_date">Tanggal Upload</label>
                    <input type="date" id="upload_date" name="upload_date" class="form-control" value="${today}" required>
                </div>
                <div class="form-group">
                    <label for="document">Upload Dokumen</label>
                    <input type="file" id="document" name="document" class="form-control" accept=".pdf,.doc,.docx,.xlsx,.xls" required>
                </div>
            `;
        }
    } else if (category === 'promotion_videos') {
        formContent = `
            <div class="form-group">
                <label for="video_title">Judul Video</label>
                <input type="text" name="video_title" class="form-control mb-2" placeholder="Judul Video">
            </div>
            <div class="form-group">
                <label for="upload_date">Tanggal Video</label>
                <input type="date" name="upload_date" class="form-control mb-2" value="${today}">
            </div>
            <div class="form-group">
                <label for="thumbnail">Thumbnail</label>
                <input type="file" name="thumbnail" accept="image/*" class="form-control mb-2">
            </div>
            <div class="form-group">
                <label for="media">Upload Video</label>
                <input type="file" name="media" accept="video/*" class="form-control mb-2">
            </div>
        `;
    } else if (category === 'produk') {
        formContent = `
            <div class="form-group">
                <label for="title">Nama Produk</label>
                <input type="text" name="title" class="form-control">
            </div>
            <div class="form-group">
                <label for="image">Upload Gambar Produk</label>
                <input type="file" name="image" class="form-control" accept="image/*">
            </div>
            <div class="form-group">
                <label for="upload_date">Tanggal Upload</label>
                <input type="date" name="upload_date" class="form-control" value="${today}">
            </div>
            <div class="form-group">
                <label for="description">Deskripsi</label>
                <textarea name="description" class="form-control" rows="3"></textarea>
            </div>
        `;
    }
    document.getElementById('editModalBody').innerHTML = formContent;

    document.getElementById('editForm').addEventListener('submit', function(event) {
        event.preventDefault();
        const formData = new FormData(this);
        fetch(this.action, {
            method: 'POST',
            body: formData,
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: data.message,
                }).then(() => {
                    const modal = bootstrap.Modal.getInstance(document.getElementById('editModal'));
                    modal.hide();
                    location.reload();
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: data.message || 'Terjadi kesalahan saat mengedit media.',
                });
            }
        })
        .catch(error => {
            console.error('Error:', error);
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: 'Terjadi kesalahan saat mengedit media.',
            });
        });
    });

    new bootstrap.Modal(document.getElementById('editModal')).show();
}

function openDeleteModal(id) {
    const form = document.getElementById('deleteForm');
    form.action = `/petugas/media/${id}`;

    form.onsubmit = function(event) {
        event.preventDefault();
        const formData = new FormData (this);

        fetch(this.action, {
            method: 'POST',
            body: formData,
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: 'Media berhasil dihapus!',
                }).then(() => {
                    location.reload();
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: 'Terjadi kesalahan saat menghapus media.',
                });
            }
        })
        .catch(error => {
            console.error(error);
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: 'Terjadi kesalahan saat menghapus media.',
            });
        });
    };

    new bootstrap.Modal(document.getElementById('deleteModal')).show();
}
</script>

@endsection