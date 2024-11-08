<?php

namespace App\Http\Controllers;

use App\Models\User; // Pastikan ini ditambahkan
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Ambil data yang diperlukan untuk dashboard
        $users = User::where(function($query) {
            $query->where('role', 'petugas')
                  ->orWhere('role', 'admin');
        })->where('id', '!=', auth()->id())->get(); // Mengecualikan pengguna yang sedang login
    
        $totalUsers = User::count();
        $totalMedia = Media::count(); // Anda perlu menambahkan model Media dan query ini jika belum ada
        $recentMedia = Media::orderBy('created_at', 'desc')->take(5)->get(); // Sesuaikan dengan model Media Anda
        $newUserRegistrations = User::whereDate('created_at', '>', now()->subWeek())->count();
    
        return view('admin.dashboard', compact('totalUsers', 'totalMedia', 'recentMedia', 'newUserRegistrations', 'users'));
    }

    public function show()
    {
        $user = Auth::user();
        return view('admin.profile.show', compact('user'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('admin.profile.edit', compact('user'));
    }
}
