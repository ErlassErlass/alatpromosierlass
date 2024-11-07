<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Media;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class PetugasController extends Controller
{
    public function dashboard()
    {
        $users = User::where(function($query) {
            $query->where('role', 'petugas')
                  ->orWhere('role', 'admin');
        })->where('id', '!=', auth()->id())->get();

        $userId = Auth::id();
        $totalMediaPetugas = Media::where('user_id', $userId)->count();
        $recentMedia = Media::where('user_id', $userId)->orderBy('created_at', 'desc')->take(5)->get();

        return view('petugas.dashboard', compact('totalMediaPetugas', 'recentMedia', 'users'));
    }

public function index()
{
    // Get the authenticated user ID
    $userId = auth()->id();

    // Define the categories
    $categories = ['motivational_quotes', 'alat_promosi_internal', 'design_corner', 'promotion_videos', 'produk'];
    $mediaByCategory = [];

    // Loop through categories and fetch media for each category uploaded by the authenticated user
    foreach ($categories as $category) {
        $mediaByCategory[$category] = Media::where('category', $category)
            ->where('user_id', $userId) // Only get media uploaded by the authenticated user
            ->get();
    }

    $users = User::where(function($query) {
        $query->where('role', 'petugas')
              ->orWhere('role', 'admin');
    })->where('id', '!=', auth()->id())->get();

    // Fetch media uploaded by the authenticated user
    $media = Media::where('user_id', $userId)->get();
    return view('petugas.media.index', compact('media', 'users', 'mediaByCategory'));
}

    public function show()
    {
        $users = User::where(function($query) {
            $query->where('role', 'petugas')
                  ->orWhere('role', 'admin');
        })->where('id', '!=', auth()->id())->get();

        $user = Auth::user();
        return view('petugas.profile.show', compact('user', 'users'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('petugas.profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:8',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        
        if ($request->filled('password')) {
            $user->password = Hash::make($validated['password']);
        }
        
        if ($request->hasFile('profile_picture')) {
            if ($user->profile_picture) {
                Storage::delete('public/' . $user->profile_picture);
            }
            
            $file = $request->file('profile_picture');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/profile_pictures', $filename);
            $user->profile_picture = 'profile_pictures/' . $filename;
        }

        $user->save();
        
        return redirect()->route('petugas.profile.show')->with('success', 'Profile updated successfully');
    }

    public function showUploadMediaForm()
    {
        $users = User::where('role', 'petugas')->orWhere('role', 'admin')->get();
        return view('petugas.media.upload', compact('users'));
    }
}