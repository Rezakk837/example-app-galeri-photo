<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class GaleriPhotoController extends Controller
{
    public function index()
    {
        return view('admin.galeri-photo.index', [
            'pageTitle' => 'Galeri-Photo',
            // 'listPost' => Post::all(),//Cara pertama
            'listPost' => Post::first(),
        ]);
    }

    public function create()
    {
        return view('admin.galeri-photo.create', [
            'pageTitle' => 'Create Photo',
        ]);
    }
}
