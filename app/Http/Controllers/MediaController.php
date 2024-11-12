<?php

namespace App\Http\Controllers;

use App\Models\User; // Pastikan ini ditambahkan
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Media;
use Illuminate\Support\Str;

class MediaController extends Controller
{
    public function uploadMedia(Request $request)
    {
        \Log::info('Upload media called');
        // Validasi file dan input
        $rules = $this->getValidationRules($request->input('category'));
        try {
            $request->validate($rules);
        } catch (\Illuminate\Validation\ValidationException $e) {
            \Log::error('Validation failed: ' . json_encode($e->errors()));
            return back()->withErrors($e->errors());
        }
        $request->validate($rules);
    
        // Upload file media, gambar, dan thumbnail
        $media = $this->handleFileUpload($request, 'media', 'public/videos', 'video_title');
        $image = $this->handleFileUpload($request, 'image', 'public/images', 'title');
        $thumbnail = $this->handleFileUpload($request, 'thumbnail', 'public/thumbnails', 'video_title');
        $document = $this->handleFileUpload($request, 'document', 'public/documents', 'designer_name'); // Mengupload dokumen
    
        // Simpan data media ke database
        $createdMedia = Media::create([
            'media' => $media,
            'image' => $image,
            'thumbnail' => $thumbnail,
            'category' => $request->input('category'),
            'title' => $request->input('title', null),
            'upload_date' => $request->input('upload_date', null),
            'description' => $request->input('description', null),
            'designer_name' => $request->input('designer_name', null),
            'video_title' => $request->input('video_title', null),
            'video_date' => $request->input('video_date', null),
            'quote' => $request->input('quote', null),
            'document' => $document, // Simpan dokumen
            'user_id' => auth()->id(), // Simpan ID user yang mengupload
        ]);
    
        // Tentukan pesan notifikasi berdasarkan kategori media
        $message = '';
        switch ($createdMedia->category) {
            case 'motivational_quotes':
                $message = 'Quote motivasi berhasil diunggah!';
                break;
            case 'alat_promosi_internal':
                $message = 'Alat promosi internal berhasil diunggah!';
                break;
            case 'design_corner':
                $message = 'Desain baru berhasil diunggah ke Design Corner!';
                break;
            case 'promotion_videos':
                $message = 'Video promosi berhasil diunggah!';
                break;
            case 'produk':
                $message = 'Produk baru berhasil diunggah!';
                break;
            default:
                $message = 'Media berhasil diunggah!';
                break;
        }
    
        return back()->with('success', $message);
    }    

    public function index()
    {
        $categories = ['motivational_quotes', 'alat_promosi_internal', 'design_corner', 'promotion_videos', 'produk'];
        $mediaByCategory = []; // Initialize the array
    
        // Loop through categories and fetch media for each category
        foreach ($categories as $category) {
            $mediaByCategory[$category] = Media::where('category', $category)->get();
        }
    
        // Fetch users with specific roles
        $users = User::where(function($query) {
            $query->where('role', 'petugas')->orWhere('role', 'admin');
        })->where('id', '!=', auth()->id())->get();
    
        // Return the view with media and users data
        return view('admin.media.index', compact('mediaByCategory', 'users'));
    }

    public function update(Request $request, $id)
    {
        \Log::info('Update request data:', $request->all()); // Log data yang diterima
    
        $media = Media::findOrFail($id);
        
        // Validasi input
        $request->validate($this->getValidationRulesForUpdate());
        
        // Update file media, gambar, dan thumbnail jika ada
        if ($request->hasFile('media')) {
            $this->updateFile($request, $media, 'media', 'public/videos', 'video_title');
        }
        
        if ($request->hasFile('thumbnail')) {
            $this->updateFile($request, $media, 'thumbnail', 'public/thumbnails', 'video_title');
        }
        
        if ($request->hasFile('image')) {
            $this->updateFile($request, $media, 'image', 'public/images', 'title');
        }

        if ($request->hasFile('document')) {
            $this->updateFile($request, $media, 'document', 'public/documents', 'designer_name');
        }
        
        // Update data lainnya jika ada
        $updateData = [
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'designer_name' => $request->input('designer_name'),
            'upload_date' => $request->input('upload_date'),
            'video_title' => $request->input('video_title'),
            'video_date' => $request->input('video_date'),
            'quote' => $request->input('quote'),
        ];
        
        // Hanya update jika ada input yang tidak null
        foreach ($updateData as $key => $value) {
            if ($value === null) {
                unset($updateData[$key]);
            }
        }
        
        $media->update($updateData);
        
        // Mengembalikan respons JSON
        return response()->json(['success' => true, 'message' => 'Media berhasil diperbarui!']);
    }
    
    private function updateFile(Request $request, $media, $fileInputName, $storagePath, $titleInputName)
    {
        if ($request->hasFile($fileInputName)) {
            // Hapus file lama jika ada
            if ($media->$fileInputName) {
                \Log::info("Attempting to delete old file: {$media->$fileInputName}");
                $this->deleteFile($media->$fileInputName, $storagePath);
            }
    
            // Simpan file baru
            $fileUrl = $this->handleFileUpload($request, $fileInputName, $storagePath, $titleInputName);
            $media->$fileInputName = $fileUrl;
    
            // Tambahkan logging untuk memastikan URL baru
            \Log::info("Updated {$fileInputName} with URL: {$fileUrl}");
    
            // Simpan perubahan ke database
            $media->save();
        }
    }
    

    private function handleFileUpload(Request $request, $fileInputName, $storagePath, $titleInputName)
    {
        if ($request->hasFile($fileInputName)) {
            $file = $request ->file($fileInputName);
            \Log::info("File input name: {$fileInputName}, File name: {$file->getClientOriginalName()}");
    
            // Tambahkan log untuk ukuran file
            \Log::info("File size: " . $file->getSize());
    
            // Tambahkan timestamp atau ID media ke nama file
            $fileName = Str::slug($request->input($titleInputName, 'default')) . '-' . time() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs($storagePath, $fileName);
    
            \Log::info("File uploaded: {$fileName} to {$filePath}");
    
            return Storage::url($filePath);
        }
        \Log::warning("No file found for input: {$fileInputName}");
        return null;
    }

    public function destroy($id)
    {
        $media = Media::find($id);
        if ($media) {
            // Hapus file gambar jika ada
            if ($media->image && Storage::exists($media->image)) {
                Storage::delete($media->image);
            }
            // Hapus file dokumen jika ada
            if ($media->document && Storage::exists($media->document)) {
                Storage::delete($media->document);
            }
            $media->delete();
            return response()->json(['success' => true, 'message' => 'Media berhasil dihapus']);
        }
        return response()->json(['success' => false, 'message' => 'Media tidak ditemukan']);
    }

    private function getValidationRules($category)
    {
        $rules = ['category' => 'required|string'];
    
        switch ($category) {
            case 'motivational_quotes':
                $rules['image'] = 'required|mimes:jpeg,png,jpg,gif,svg|max:10240';
                $rules['upload_date'] = 'required|date';
                $rules['quote'] = 'required|string|max:500';
                break;
    
            case 'alat_promosi_internal':
                $rules['description'] = 'required|string';
                $rules['title'] = 'required|string|max:255';
                $rules['image'] = 'required|mimes:jpeg,png,jpg,gif,svg|max:10240';
                $rules['upload_date'] = 'required|date';
                break;
    
            case 'design_corner':
                $rules['designer_name'] = 'required|string|max:255';
                $rules['description'] = 'required|string';
                $rules['upload_date'] = 'required|date';
                $rules['image'] = 'nullable|mimes:jpeg,png,jpg,gif,svg|max:10240';
                $rules['document'] = 'nullable|file|mimes:pdf,doc,docx,xlsx,xls|max:20480';
                break;

        case 'promotion_videos':
            $rules['video_title'] = 'required|string|max:255';
            $rules['video_date'] = 'required|date';
            $rules['thumbnail'] = 'required|mimes:jpeg,png,jpg,gif,svg|max:10240'; // Thumbnail harus berupa gambar
            $rules['media'] = 'required|mimes:mp4,mkv,avi|max:200000'; // Hanya menerima video
            break;

        case 'produk':
            $rules['description'] = 'required|string';
            $rules['title'] = 'required|string|max:255';
            $rules['image'] = 'required|mimes:jpeg,png,jpg,gif,svg|max:10240'; // Hanya menerima gambar
            $rules['upload_date'] = 'required|date';
            break;

        default:
            abort(400, 'Kategori tidak dikenali.');
    }

    return $rules;
}

    private function getValidationRulesForUpdate()
    {
        return [
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'designer_name' => 'nullable|string|max:255',
            'upload_date' => 'nullable|date',
            'video_title' => 'nullable|string|max:255',
            'video_date' => 'nullable|date',
            'thumbnail' => 'nullable|image|max:2048',
            'media' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg,mp4,mkv,avi|max:200000',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:10240',
            'quote' => 'nullable|string',
            'document' => 'nullable|file|mimes:pdf,doc,docx,xlsx,xls|max:20480',
        ];
    }

    private function deleteFile($fileUrl, $storagePath)
    {
        $fileName = basename($fileUrl); // Ambil nama file dari URL
        if ($fileName && Storage::exists("{$storagePath}/{$fileName}")) {
            \Log::info("Deleting file: {$storagePath}/{$fileName}");
            Storage::delete("{$storagePath}/{$fileName}");
        }
    }

public function showUploadForm()
{
    // Ambil semua pengguna untuk ditampilkan di form upload
    $users = User::where(function($query) {
        $query->where('role', 'petugas')
              ->orWhere('role', 'admin');
    })->where('id', '!=', auth()->id())->get(); // Mengecualikan pengguna yang sedang login
    
    return view('admin.media.upload', compact('users')); // Kirim variabel users ke view
}

    public function showPromotionVideos()
    {
        $media = Media::where('category', 'promotion_videos')->get()->map(function ($item) {
            // Menandai sebagai baru jika diupload dalam 1 hari terakhir
            $item->is_new = $this->isMediaNew($item->video_date);
            return $item;
        });
        return view('categories.promotion_videos', compact('media'));
    }

    public function showMotivationalQuotes() 
    {
        $media = Media::where('category', 'motivational_quotes')->get()->map(function ($item) {
            // Menandai sebagai baru jika diupload dalam 1 hari terakhir
            $item->is_new = $this->isMediaNew($item->upload_date);
            return $item;
        });
        return view('categories.motivational_quotes', compact('media'));
    }

    public function showDesignCorner()
    {

    
        // Fetch media items for the 'design_corner' category
        $media = Media::where('category', 'design_corner')->get()->map(function ($item) {
            // Mark as new if uploaded in the last day
            $item->is_new = $this->isMediaNew($item->upload_date);
            return $item;
        });
    
        // Return the view with both media and documents
        return view('categories.design_corner', compact('media'));
    }

    public function showAlatPromosiInternal()
    {
        // Mengambil media berdasarkan kategori 'alat_promosi_internal'
        $media = Media::where('category', 'alat_promosi_internal')->get()->map(function ($item) {
            // Menandai sebagai baru jika diupload dalam 1 hari terakhir
            $item->is_new = $this->isMediaNew($item->upload_date);
            return $item;
        });
    
        // Mengirim data ke view
        return view('categories.alat_promosi_internal', compact('media'));
    }

    public function showProduk()
    {
        // Mengambil media berdasarkan kategori 'alat_promosi_internal'
        $media = Media::where('category', 'produk')->get()->map(function ($item) {
            // Menandai sebagai baru jika diupload dalam 1 hari terakhir
            $item->is_new = $this->isMediaNew($item->upload_date);
            return $item;
        });
    
        // Mengirim data ke view
        return view('categories.produk', compact('media'));
    }

    public function show($id)
    {
        $media = Media::findOrFail($id); // Cari media berdasarkan ID, jika tidak ditemukan akan error 404
        return view('petugas.media.show', compact('media')); // Tampilkan view yang sesuai untuk menampilkan detail media
    }
        // Fungsi untuk menentukan apakah media baru
        private function isMediaNew($uploadDate)
        {
            return now()->diffInDays(\Carbon\Carbon::parse($uploadDate)) < 1; 
        }
        public function detail($title)
        {
            $media = Media::findOrFail($title); // Ambil detail media berdasarkan ID
            return view('categories.detail', compact('media')); // Tampilkan view detail produk
        }
        
}
