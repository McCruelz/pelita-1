<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;

class AdminPostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $posts = Post::latest()->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => 'nullable|unique:posts,slug',
            'body' => 'required',
            'image' => 'nullable|image|max:2048', // Validasi file gambar
        ]);

        $imagePath = null;

        // Cek apakah file gambar diupload
        if ($request->hasFile('image')) {
            $imagePath = $this->handleFileUpload($request->file('image'), 'post-images');
        }

        Post::create([
            'title' => $request->title,
            'slug' => $request->slug ?? Str::slug($request->title),
            'body' => $request->body,
            'image' => $imagePath,
            'author_id' => Auth::guard('admin')->id(),
        ]);

        return redirect()->route('admin.posts.index')->with('success', 'Artikel berhasil dibuat!');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|max:255',
            'slug' => 'nullable|unique:posts,slug,' . $post->id,
            'body' => 'required',
            'image' => 'nullable|image|max:2048', // Validasi file gambar
        ]);
    
        // Proses gambar baru jika ada
        if ($request->hasFile('image')) {
            $imagePath = $this->handleFileUpload($request->file('image'), 'post-images', $post->image); // Ganti gambar lama
            $post->image = $imagePath;
        }
    
        // Update data lainnya
        $post->update([
            'title' => $request->title,
            'slug' => $request->slug ?? Str::slug($request->title),
            'body' => $request->body,
            'image' => $post->image, // Tetap simpan path gambar
        ]);
    
        return redirect()->route('admin.posts.index')->with('success', 'Artikel berhasil diperbarui!');
    }

    public function destroy(Post $post)
    {
        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }
    
        $post->delete();
    
        return redirect()->route('admin.posts.index')->with('success', 'Artikel berhasil dihapus!');
    }
    

    protected function handleFileUpload($file, $directory, $oldFilePath = null)
{
    // Hapus file lama jika ada
    if ($oldFilePath) {
        Storage::disk('public')->delete($oldFilePath);
    }

    // Simpan file baru
    return $file->store($directory, 'public');
}
}

