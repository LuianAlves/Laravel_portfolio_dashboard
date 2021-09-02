<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Brand;
use App\Models\Slider;
use App\Models\HomeAbout;
use App\Models\Portofolio;
use App\Models\Category;

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

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');


// ---- Site Pages ----

Route::get('/', function () {
    $brands = Brand::all();
    $sliders = Slider::all();
    $abouts = HomeAbout::all();
    $portfolio = Portofolio::all();
    $categories = Category::all();
    return view('app.home.home', compact('brands', 'abouts', 'portfolio', 'categories', 'sliders'));
})->name('home');


// ----- Login Panel ----------

// Category Controller
Route::get('/category/all', 'CategoryController@AllCat')->name('all.category');
Route::post('/category/add', 'CategoryController@AddCat')->name('store.category'); // create
Route::get('/category/edit/{id}', 'CategoryController@Edit'); // edit
Route::post('/category/update/{id}', 'CategoryController@Update'); // update
Route::get('/softdelete/category/{id}', 'CategoryController@SoftDelete'); // softDelete
Route::get('/category/restore/{id}', 'CategoryController@Restore'); // restore
Route::get('/destroy/category/{id}', 'CategoryController@Destroy'); // forceDelete

// SubCategory Controller
Route::get ('/scategory/all',         'SubCategoryController@AllSubCat')->name('all.scategory');
Route::post('/scategory/add',         'SubCategoryController@AddSubCat')->name('store.scategory'); // Store
Route::get ('/scategory/edit/{id}',   'SubCategoryController@Edit'); // edit
Route::post('/scategory/update/{id}', 'SubCategoryController@Update'); // update
Route::get ('/scategory/destroy/{id}','SubCategoryController@Destroy'); // destroy


// Brand Controller
Route::get('/brand/all', 'BrandController@AllBrand')->name('all.brand');
Route::post('/brand/add', 'BrandController@StoreBrand')->name('store.brand'); // store
Route::get('/brand/edit/{id}', 'BrandController@Edit'); // edit
Route::post('/brand/update/{id}', 'BrandController@Update'); // update
Route::get('/brand/destroy/{id}', 'BrandController@Destroy'); // destroy

// Multi Image 
Route::get('/multi/image', 'BrandController@Multiplic')->name('multi.image'); // index
Route::post('/image/add', 'BrandController@StoreImage')->name('store.image'); // store

// Home Routes - Slider ===============================================================================
    Route::get('/home/slider', 'HomeController@HomeSlider')->name('home.slider');       // sliderIndex
    Route::get('/add/slider', 'HomeController@AddSlider')->name('add.slider');          // sliderCreate
    Route::post('/store/slider', 'HomeController@StoreSlider')->name('store.slider');   // sliderStore
    Route::get('/edit/slider/{id}', 'HomeController@EditSlider');                       // sliderEdit
    Route::post('/update/slider/{id}', 'HomeController@UpdateSlider');                  // sliderUpdate
    Route::get('/destroy/slider/{id}', 'HomeController@DestroySlider');                 // sliderDestroy

//About Me ============================================================================================
    Route::get('/home/about', 'AboutController@HomeAbout')->name('home.about');     // aboutIndex
    Route::get('/add/about', 'AboutController@AddAbout')->name('add.about');        // aboutCreate
    Route::post('/store/about', 'AboutController@StoreAbout')->name('store.about'); // aboutStore
    Route::get('/edit/about/{id}', 'AboutController@EditAbout');                    // aboutEdit
    Route::post('/update/homeabout/{id}', 'AboutController@UpdateAbout');           // aboutUpdate
    Route::get('/destroy/about/{id}', 'AboutController@DestroyAbout');             // sliderDestroy

// Portfolio
    Route::get('/home/portfolio', 'PortfolioController@HomePortfolio')->name('home.portfolio');  
    Route::post('/add/portfolio', 'PortfolioController@Store')->name('store.portfolio');            // store
    Route::get('/edit/portfolio/{id}', 'PortfolioController@Edit');                                 // edit
    Route::post('update/portfolio/{id}', 'PortfolioController@Update');                             // update
    Route::get('softdelete/portfolio/{id}', 'PortfolioController@SoftDelete');                      // softdelete
    Route::get('restore/portfolio/{id}', 'PortfolioController@Restore');                            // restore
    Route::get('destroy/portfolio/{id}', 'PortfolioController@Destroy');

// -----

    // Page Contact
    Route::get('/admin/contact', 'ContactController@AdminContact')->name('admin.contact');  
    Route::get('/add/contact', 'ContactController@AdminAddContact')->name('add.contact');
    Route::post('/store/contact', 'ContactController@AdminStoreContact')->name('store.contact');
    Route::get('/admin/message', 'ContactController@AdminMessage')->name('admin.message');

    // Home Contact
    Route::get('/contact', 'ContactController@Contact')->name('contact');
    Route::post('/contact/form', 'ContactController@ContactForm')->name('contact.form');



//----------------------------------------------------------------------------
// Auth  
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    
    // $users = User::all();
    // $users = DB::table('users')->get(); // Query Builder
    // return view('admin.index', compact('users'));

    return view('admin.index');
})->name('dashboard');

Route::get('/user/logout', 'BrandController@Logout')->name('user.logout');


// Change Password and user Profile Route
Route::get('/user/password', 'ChangePassController@CPassword')->name('change.password');
Route::post('/password/update', 'ChangePassController@UpdatePassword')->name('password.update');

// User Profile
Route::get('/user/profile', 'ChangePassController@PUpdate')->name('profile.update');
Route::post('/user/profile/update', 'ChangePassController@UpdateProfile')->name('update.user.profile');

