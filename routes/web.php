<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BlogController as AdminBlogController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\FarmVisitController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\FooterController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\ContactAdminController;

/*
|--------------------------------------------------------------------------
| الصفحات العامة (الفرونت إند)
|--------------------------------------------------------------------------
*/

// الصفحة الرئيسية
Route::get('/', function () {
    return view('home');
})->name('home');

// صفحة تواصل معنا
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

// عرض مقال فردي في الموقع (الفرونت)
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');


/*
|--------------------------------------------------------------------------
| الملف الشخصي (Profile)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


/*
|--------------------------------------------------------------------------
| لوحة التحكم (Admin Panel)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {

    // الصفحة الرئيسية للوحة التحكم
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

    // المستخدمين
    Route::resource('users', UserController::class);

    // السلايدر
    Route::resource('sliders', SliderController::class);

    // قسم من نحن
    Route::resource('about', AboutController::class);

    // المميزات
    Route::resource('features', FeatureController::class);

    // المنتجات
    Route::resource('products', ProductController::class);

    // زيارة المزرعة
    Route::resource('farm_visit', FarmVisitController::class);

    // المدونة (المقالات)
    Route::resource('blog', AdminBlogController::class);

    // آراء العملاء (Testimonials)
    Route::resource('testimonials', TestimonialController::class);

    // الفوتر
    Route::get('/footer', [FooterController::class, 'index'])->name('footer.index');
    Route::post('/footer', [FooterController::class, 'update'])->name('footer.update');

    // 📩 رسائل التواصل
    Route::resource('contacts', ContactAdminController::class)->only(['index', 'show', 'destroy']);

});


/*
|--------------------------------------------------------------------------
| مصادقة المستخدم (Auth)
|--------------------------------------------------------------------------
*/
require __DIR__ . '/auth.php';
