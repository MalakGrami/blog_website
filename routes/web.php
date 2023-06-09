<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\userController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// views
Route::get('/', [BlogController::class,'home'])->name('home');
// Route::get('/allcategories', [CategoryController::class,'allcategories'])->name('allcategories');
Route::get('/register', function () {return view('auth/register');})->middleware('guest')->name('user.register');
Route::get('/login', function () {return view('auth/login');})->middleware('guest')->name('users.login');

Route::get('/blogUser', function () {return view('user/blogs/addBlog');})->name('blogUser')->middleware('auth');
Route::get('/blog/{id}', [BlogController::class,'show'])->name('blog.show');

Route::group( ['prefix'=>'user','middleware' =>'auth'],function() {
    Route::post('/update-profile/{id}', [userController::class,'updateProfile'])->name('updateProfile');
    Route::get('/settings', [userController::class,'editProfile']) ->name('settings');
    Route::post('/changePassword/{id}', [userController::class,'changePassword']) ->name('changePassword');
    // Route::get('/createBlog', [BlogController::class,'create_Blog'])->name('createBlog');
    // Route::post('/blog/add', [BlogController::class,'store'])->name('store_blog');
    Route::get('/createBlog', [BlogController::class,'createBlog'])->name('create_blog');
    Route::post('/blog/add', [BlogController::class,'store'])->name('store_blog'); 
    Route::get('/blogs', [BlogController::class,'all_blogs_of_user'])->name('blogs_of_user');
    
    Route::delete('/blog/{id}', [BlogController::class,'deleteBlog'])->name('deleteBlog');
    // update
   
    Route::get('/updateBlog/{id}', [BlogController::class, 'edit'])->name('updateBlog');
    Route::put('/updateBlog/{id}', [BlogController::class,'update'])->name('update');
    

});




// register
Route::post('/register', [AuthController::class,'postResgister'])->name('register')->middleware('guest');
// login
Route::post('/login', [AuthController::class,'postLogin'])->name('login')->middleware('guest');
// logout
Route::post('/logout', [AuthController::class,'logout'])->name('logout')->middleware('auth');


Route::group( ['prefix'=>'adminPanel','middleware' =>'authAdmin'],function() {
    
    // Route::get('/users', function () {return view('adminPanel/users/index');})->name('users');
    Route::get('/users', [userController::class,'getUsers'])->name('users');
    Route::get('/accept_blog', function () {return view('adminPanel/blog/accept_blog');})->name('accept_blog');
    

    // categories
    Route::get('/categories', [CategoryController::class,'index'])->name('categories');
    Route::post('/categories', [CategoryController::class,'add'])->name('add_categories');
    Route::delete('/categories/{id}', [CategoryController::class,'delete'])->name('delete_categorie');

    // blog
    Route::get('/blog', [BlogController::class,'index'])->name('blog');
    // Route::get('/blog/{id}', [BlogController::class,'show'])->name('blog.show');
    Route::put('/blog/{id}', [BlogController::class,'acceptBlog'])->name('acceptBlog');
   
    // Dashboard
    Route::get('/', [DashboardController::class,'getDashboardData'])->name('Dashboard');
    // Route::get('/blog-with-category', [CategoryController::class,'blog_with_category'])->name('blog.with.category');
    // Route::get('/', function () {return view('adminPanel/dashboard');})->name('Dashboard');

 
    // Route::get('/', function () {
    //     $blogController = new BlogController();
    //     $blogData = $blogController->blog_in_day();
    
    //     $categoryController = new CategoryController();
    //     $blog_with_category = $categoryController->blog_with_category();
    
    //     return view('adminPanel.dashboard', compact('blogData', 'blog_with_category'));
    // })->name('Dashboard');
    
    
    
    


});



