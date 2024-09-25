<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Helpers\category;
use Illuminate\Support\Facades\Auth;

class GaleriPhotoController extends Controller
{
    public function index()
    {
        return view('admin.galeri-photo.index', [
            'pageTitle' => 'Galeri-Photo',
            // 'listPost' => Post::all(),//Cara pertama
            // 'listPost' => Post::first(),//Cara kedua
            'listPost' => Post::all(),
        ]);
    }

    public function create()
    {
        return view('admin.galeri-photo.create', [
            'pageTitle' => 'Create Photo',
            'listCategory' => category::categories
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'category' => 'required',
            'description' => 'required'
        ],[
            'title.required' => '*Judul postingan wajib diisi',
            'description.required' => '*Deskripsi postingan wajib diisi'
        ]);

        $post = Post::create([
            'title' => $validated['title'],
            'category'=> $validated['category'],
            'description'=> $validated['description'],
            'user_id' => Auth::user()->id
        ]);
        // dd($post);
        return redirect(route('admin-galeri-dashboard', absolute: false));
    }
}
