<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\ComplaintController;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\User;


Route::get('/', function () {
    return view('home', ['title' => 'PELITA - Home Page']);
});

Route::get('/articles', function () {
    $articles = Post::latest()->paginate(10);
    return view('articles', ['title' => 'Artikel', 'articles' => $articles]);
})->name('articles');

Route::get('/home', function () {
    return view('home', ['title' => 'PELITA - Home Page']);
})->middleware(['auth', 'verified'])->name('home');

Route::prefix('profile')->middleware('auth')->group(function () {
    Route::get('/show', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/delete-image', [ProfileController::class, 'deleteImage'])->name('profile.deleteImage');
    Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('admin/posts')->middleware('auth:admin')->group(function () {
    Route::get('/', [AdminPostController::class, 'index'])->name('admin.posts.index');
    Route::get('/create', [AdminPostController::class, 'create'])->name('admin.posts.create');
    Route::post('/', [AdminPostController::class, 'store'])->name('admin.posts.store');
    Route::get('/{post:slug}/edit', [AdminPostController::class, 'edit'])->name('admin.posts.edit');
    Route::patch('/{post:slug}', [AdminPostController::class, 'update'])->name('admin.posts.update');
    Route::delete('/{post:slug}', [AdminPostController::class, 'destroy'])->name('admin.posts.destroy');
});


Route::get('/article/{post:slug}', function (Post $post) {
    return view('post', ['post' => $post]);
});

Route::get('/authors/{user}', function (User $user) {
    return view('articles', ['title'=> 'Articles by ' . $user->name, 'articles' => $user->articles]);
});


Route::get('/about', function () {
    return view('about', ['name' => 'Kelompok 6 Gacor', 'title' => 'Tentang PELITA']);
});

Route::prefix('complaints')->middleware('auth')->group(function () {
    Route::get('/create', [ComplaintController::class, 'create'])->name('complaints.create');
    // Route::post('/', [ComplaintController::class, 'store'])->name('complaints.store');
    Route::get('/', [ComplaintController::class, 'index'])->name('complaints.index');
    Route::get('/{complaint}', [ComplaintController::class, 'show'])->name('complaints.show');
});

Route::prefix('admin/complaints')->middleware('auth:admin')->group(function () {
    // Daftar Laporan
    Route::get('/', [ComplaintController::class, 'adminIndex'])->name('admin.complaints.index');
    
    // Detail Laporan dan Update Status
    Route::get('/{complaint}', [ComplaintController::class, 'adminShow'])->name('admin.complaints.show');
    Route::patch('/{complaint}', [ComplaintController::class, 'update'])->name('admin.complaints.update'); // Mengupdate status
});



require __DIR__.'/auth.php';

require __DIR__.'/admin-auth.php';