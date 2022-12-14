<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\DashboardPostController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home',[
        "tittle"=>"Home",
        "active" => "Home",
    ]);
});


Route::get('/about', function () {


    return view('about',[
        "tittle"=>"About",
        "nama"=>"Hans F Barry",
        "email"=>"hansbarry214@gmail.com",
        "img"=>"public/img/iptek.png",
        "active" => "About"
    ]);
});

Route::get('/contact', function () {
    return view('contact',[
        "tittle"=>"Contact",
        "active" => "Contact"
    ]);
});

Route::get('/posts', [PostController::class,'index']);

Route::get('/posts/{post:slug}', [PostController::class,'show']);

Route::get('/categories', function(){
    return view('categories', [
        'tittle' => 'Categories',
        "active" => "Categories",
        'categories' => Category::all()
    ]);
});
Route::get('/categories/{category:slug}', function(Category $category){
    return view('posts',[
        'tittle' => "Posts by Category :$category->name",
        "active" => "Categories",
        'posts' => $category->posts->load('category','user'),
        'category' => $category->name
    ]);
});

Route::get('/authors/{author:username}', function(User $author){
    return view('posts',[
        'tittle' => "Posted By : $author->name",
        "active" => "Author",
        'posts' => $author->posts->load('category','user')
    ]);
});

Route::get('/login', [LoginController::class,'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class,'authenticate']);

Route::get('/register', [RegisterController::class,'index'])->middleware('guest');
Route::post('/register', [RegisterController::class,'store']);

Route::get('/dashboard', function(){
    return view('dashboard.index');
})->middleware('auth');

Route::post('/logout', [LoginController::class,'logout'])->middleware('auth');
Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class,'checkSlug'])->middleware('auth');
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');
Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('admin');



