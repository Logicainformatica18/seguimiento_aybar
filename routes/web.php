<?php

use App\Http\Controllers\ExamController;
use App\Http\Controllers\RegistryDetailController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
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
Route::get('/', function () {
    return redirect("login");
});





Route::get('prueba', function () {
    return view("home.home");
});


Route::get('/ejecutar', [App\Http\Controllers\GenerateProductionController::class, 'generate']);


Route::get('/usuarios', [App\Http\Controllers\UserController::class, 'index']);




Route::get('admin/reclamaciones', [App\Http\Controllers\BookController::class, 'index']);
Route::get('libro_reclamaciones', [App\Http\Controllers\BookController::class, 'indexPublic']);
Route::post('BookStorePublic', [App\Http\Controllers\BookController::class, 'storePublic'])->middleware('throttle:50,1440');
Route::post('BookDestroy', [App\Http\Controllers\BookController::class, 'destroy'])->middleware('permission:administrar|eliminar');
Route::post('BookEdit', [App\Http\Controllers\BookController::class, 'edit'])->middleware('permission:administrar|editar');
Route::post('BookUpdate', [App\Http\Controllers\BookController::class, 'update'])->middleware('permission:administrar|actualizar');





use App\Http\Controllers\ChatbotController;

Route::get('/chat', [ChatbotController::class, 'index']);
Route::post('/chatPost', [ChatbotController::class, 'chat'])->middleware('throttle:1000,1440');

Route::get('proyectos/{description}', [App\Http\Controllers\ProjectController::class, 'public']);

Auth::routes();

   //USUARIOS
   Route::get('home_demo/plantilla', [App\Http\Controllers\Home_demoController::class, 'template']);
   Route::get('home_demo/inicio', [App\Http\Controllers\Home_demoController::class, 'home']);
   Route::get('home_demo/nosotros', [App\Http\Controllers\Home_demoController::class, 'us']);
   Route::get('home_demo/proyectos', [App\Http\Controllers\Home_demoController::class, 'project']);
   Route::get('home_demo/blog', [App\Http\Controllers\Home_demoController::class, 'blog']);
   Route::get('home_demo/contacto', [App\Http\Controllers\Home_demoController::class, 'contact']);

   Route::get('blog/topicPublic', [App\Http\Controllers\TopicPublicController::class, 'index']);










   Route::get('ProjectList', [App\Http\Controllers\CustomerController::class, 'ProjectList']);
   Route::post('CustomerStorePublic', [App\Http\Controllers\CustomerController::class, 'storePublic'])->middleware('throttle:200,1440');

   Route::get('blog/{url}', [App\Http\Controllers\TopicPublicController::class, 'report']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


/////////////////////////////////////////




Route::group(['middleware' => ['auth']], function () {
    //
    // Route::get('/sistema', [App\Http\Controllers\HomeController::class, 'sistema'])->name('sistema')->middleware('permission:administrar');


    Route::get('admin', [App\Http\Controllers\UserController::class, 'profile']);

    Route::get('clientes', [App\Http\Controllers\CustomerController::class, 'index'])->middleware('permission:administrar|clientes');
    Route::post('CustomerStore', [App\Http\Controllers\CustomerController::class, 'store'])->middleware('permission:administrar|agregar');
    Route::post('CustomerDestroy', [App\Http\Controllers\CustomerController::class, 'destroy'])->middleware('permission:administrar|eliminar');
    Route::post('CustomerEdit', [App\Http\Controllers\CustomerController::class, 'edit'])->middleware('permission:administrar|editar');
    Route::post('CustomerUpdate', [App\Http\Controllers\CustomerController::class, 'update'])->middleware('permission:administrar|actualizar');

    Route::get('admin/clientes_dashboard', [App\Http\Controllers\CustomerController::class, 'dashboard'])->middleware('permission:administrar|dashboard');
    Route::post('CustomerShow', [App\Http\Controllers\CustomerController::class, 'show'])->middleware('permission:administrar|clientes');


    Route::get('admin/imagenes', [App\Http\Controllers\ImageController::class, 'index'])->middleware('permission:administrar|imagenes');
    Route::post('ImageStore', [App\Http\Controllers\ImageController::class, 'store'])->middleware('permission:administrar|agregar');
    Route::post('ImageDestroy', [App\Http\Controllers\ImageController::class, 'destroy'])->middleware('permission:administrar|eliminar');
    Route::post('ImageEdit', [App\Http\Controllers\ImageController::class, 'edit'])->middleware('permission:administrar|editar');
    Route::post('ImageUpdate', [App\Http\Controllers\ImageController::class, 'update'])->middleware('permission:administrar|actualizar');

    Route::post('ImageDestroyAll', [App\Http\Controllers\ImageController::class, 'destroyAll'])->middleware('permission:administrar|eliminar');

    Route::get('admin/secciones', [App\Http\Controllers\SectionController::class, 'index'])->middleware('permission:administrar|secciones');
    Route::post('SectionStore', [App\Http\Controllers\SectionController::class, 'store'])->middleware('permission:administrar|agregar');
    Route::post('SectionDestroy', [App\Http\Controllers\SectionController::class, 'destroy'])->middleware('permission:administrar|eliminar');
    Route::post('SectionEdit', [App\Http\Controllers\SectionController::class, 'edit'])->middleware('permission:administrar|editar');
    Route::post('SectionUpdate', [App\Http\Controllers\SectionController::class, 'update'])->middleware('permission:administrar|actualizar');
    Route::post('SectionUpdateDinamic', [App\Http\Controllers\SectionController::class, 'updateDinamic']);

    Route::get('admin/proyectos', [App\Http\Controllers\ProjectController::class, 'index'])->middleware('permission:administrar|proyectos');
    Route::post('ProjectStore', [App\Http\Controllers\ProjectController::class, 'store'])->middleware('permission:administrar|agregar');
    Route::post('ProjectDestroy', [App\Http\Controllers\ProjectController::class, 'destroy'])->middleware('permission:administrar|eliminar');
    Route::post('ProjectEdit', [App\Http\Controllers\ProjectController::class, 'edit'])->middleware('permission:administrar|editar');
    Route::post('ProjectUpdate', [App\Http\Controllers\ProjectController::class, 'update'])->middleware('permission:administrar|actualizar');


    Route::get('admin/estados', [App\Http\Controllers\StatusController::class, 'index'])->middleware('permission:administrar|estados');
    Route::post('StatusStore', [App\Http\Controllers\StatusController::class, 'store'])->middleware('permission:administrar|agregar');
    Route::post('StatusDestroy', [App\Http\Controllers\StatusController::class, 'destroy'])->middleware('permission:administrar|eliminar');
    Route::post('StatusEdit', [App\Http\Controllers\StatusController::class, 'edit'])->middleware('permission:administrar|editar');
    Route::post('StatusUpdate', [App\Http\Controllers\StatusController::class, 'update'])->middleware('permission:administrar|actualizar');

    Route::get('admin/redactores', [App\Http\Controllers\EditorController::class, 'index'])->middleware('permission:administrar|redactores');
    Route::post('EditorStore', [App\Http\Controllers\EditorController::class, 'store'])->middleware('permission:administrar|agregar');
    Route::post('EditorDestroy', [App\Http\Controllers\EditorController::class, 'destroy'])->middleware('permission:administrar|eliminar');
    Route::post('EditorEdit', [App\Http\Controllers\EditorController::class, 'edit'])->middleware('permission:administrar|editar');
    Route::post('EditorUpdate', [App\Http\Controllers\EditorController::class, 'update'])->middleware('permission:administrar|actualizar');


    Route::get('admin/socio_comercial', [App\Http\Controllers\Business_partnerController::class, 'index'])->middleware('permission:administrar|socio_comercial');
    Route::post('Business_partnerStore', [App\Http\Controllers\Business_partnerController::class, 'store'])->middleware('permission:administrar|agregar');
    Route::post('Business_partnerDestroy', [App\Http\Controllers\Business_partnerController::class, 'destroy'])->middleware('permission:administrar|eliminar');
    Route::post('Business_partnerEdit', [App\Http\Controllers\Business_partnerController::class, 'edit'])->middleware('permission:administrar|editar');
    Route::post('Business_partnerUpdate', [App\Http\Controllers\Business_partnerController::class, 'update'])->middleware('permission:administrar|actualizar');












    Route::get('admin/proyectos_detalle', [App\Http\Controllers\ProjectDetailController::class, 'index'])->middleware('permission:administrar|proyectos');
    Route::post('ProjectDetailStore', [App\Http\Controllers\ProjectDetailController::class, 'store'])->middleware('permission:administrar|agregar');
    Route::post('ProjectDetailDestroy', [App\Http\Controllers\ProjectDetailController::class, 'destroy'])->middleware('permission:administrar|eliminar');
    Route::post('ProjectDetailEdit', [App\Http\Controllers\ProjectDetailController::class, 'edit'])->middleware('permission:administrar|editar');
    Route::post('ProjectDetailUpdate', [App\Http\Controllers\ProjectDetailController::class, 'update'])->middleware('permission:administrar|actualizar');


   //ADMINISTRATIVO
    Route::get('home_edit/plantilla', [App\Http\Controllers\Home_edit::class, 'template'])->middleware('permission:administrar|editar_plantilla');
    Route::get('home_edit/inicio', [App\Http\Controllers\Home_edit::class, 'home'])->middleware('permission:administrar|editar_inicio');
    Route::get('home_edit/nosotros', [App\Http\Controllers\Home_edit::class, 'us'])->middleware('permission:administrar|editar_nosotros');
    Route::get('home_edit/proyectos', [App\Http\Controllers\Home_edit::class, 'project'])->middleware('permission:administrar|editar_proyectos');
    Route::get('home_edit/blog', [App\Http\Controllers\Home_edit::class, 'blog'])->middleware('permission:administrar|editar_blog');
    Route::get('home_edit/contacto', [App\Http\Controllers\Home_edit::class, 'contact'])->middleware('permission:administrar|editar_contactos');



    Route::resource("admin/blog", App\Http\Controllers\TopicController::class)->middleware('permission:administrar|blogs');
    Route::post('topicStore', [App\Http\Controllers\TopicController::class, 'store'])->middleware('permission:administrar|agregar');
    Route::post('topicEdit', [App\Http\Controllers\TopicController::class, 'edit'])->middleware('permission:administrar|editar');
    Route::post('topicUpdate', [App\Http\Controllers\TopicController::class, 'update'])->middleware('permission:administrar|actualizar');
    Route::post('topicDestroy', [App\Http\Controllers\TopicController::class, 'destroy'])->middleware('permission:administrar|eliminar');






    Route::resource("admin/categorias", App\Http\Controllers\CategoryController::class);
    Route::post('categoryStore', [App\Http\Controllers\CategoryController::class, 'store'])->middleware('permission:administrar|agregar');
    Route::post('categoryEdit', [App\Http\Controllers\CategoryController::class, 'edit'])->middleware('permission:administrar|editar');
    Route::post('categoryUpdate', [App\Http\Controllers\CategoryController::class, 'update'])->middleware('permission:administrar|actualizar');
    Route::post('categoryDestroy', [App\Http\Controllers\CategoryController::class, 'destroy'])->middleware('permission:administrar|eliminar');


    Route::resource('admin/usuarios', App\Http\Controllers\UserController::class)->middleware('permission:administrar|usuarios');
    Route::post('userStore', [App\Http\Controllers\UserController::class, 'store'])->middleware('permission:administrar|agregar');
    Route::post('userDestroy', [App\Http\Controllers\UserController::class, 'destroy'])->middleware('permission:administrar|eliminar');
    Route::post('userEdit', [App\Http\Controllers\UserController::class, 'edit'])->middleware('permission:administrar|editar');
    Route::post('userUpdate', [App\Http\Controllers\UserController::class, 'update'])->middleware('permission:administrar|actualizar');
    Route::post('userShow', [App\Http\Controllers\UserController::class, 'show']);
    Route::post('userUpdateProfile', [App\Http\Controllers\UserController::class, 'updateProfile']);
    // Route::post('userImportGoogle', [App\Http\Controllers\UserController::class, 'importGoogle'])->name("userImportGoogle");

    Route::post('UserRoleUpdate', [App\Http\Controllers\UserRoleController::class, 'update'])->middleware('permission:administrar|actualizar');
    Route::post('UserRoleEdit', [App\Http\Controllers\UserRoleController::class, 'edit'])->middleware('permission:administrar|editar');


    Route::resource("admin/roles", App\Http\Controllers\RoleController::class)->middleware('permission:administrar|usuarios');
    Route::post('RoleStore', [App\Http\Controllers\RoleController::class, 'store'])->middleware('permission:administrar|agregar');
    Route::post('RoleEdit', [App\Http\Controllers\RoleController::class, 'edit'])->middleware('permission:administrar|editar');
    Route::post('RoleUpdate', [App\Http\Controllers\RoleController::class, 'update'])->middleware('permission:administrar|actualizar');
    Route::post('RoleDestroy', [App\Http\Controllers\RoleController::class, 'destroy'])->middleware('permission:administrar|eliminar');


    Route::post('RolePermissionUpdate', [App\Http\Controllers\RolePermissionController::class, 'update'])->middleware('permission:administrar|actualizar');
    Route::post('RolePermissionEdit', [App\Http\Controllers\RolePermissionController::class, 'edit'])->middleware('permission:administrar|editar');




    Route::resource("tipos", App\Http\Controllers\TypeController::class)->middleware('permission:administrar|tipos');
    Route::post('typeStore', [App\Http\Controllers\TypeController::class, 'store'])->middleware('permission:administrar|agregar');
    Route::post('typeEdit', [App\Http\Controllers\TypeController::class, 'edit'])->middleware('permission:administrar|editar');
    Route::post('typeUpdate', [App\Http\Controllers\TypeController::class, 'update'])->middleware('permission:administrar|actualizar');
    Route::post('typeDestroy', [App\Http\Controllers\TypeController::class, 'destroy'])->middleware('permission:administrar|eliminar');

    Route::get('home_edit/generate/{module}', [App\Http\Controllers\GenerateProductionController::class, 'generate'])->middleware('permission:administrar|actualizar');


    Route::get('admin/documentacion', function(){
        return view('doc.documentation');
    });
});


//// social media
Route::post('socialMediaShare', [App\Http\Controllers\SocialMediaController::class, 'share']);

//


Route::get('logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout']);


Route::get('/auth/google', [\App\Http\Controllers\Auth\LoginController::class, 'redirectToGoogle']);

use App\Models\User;


Route::get('/auth/google/callback', function () {
    try {
        //create a user using socialite driver google
        $user = Socialite::driver('google')->user();
        // if the user exits, use that user and login
        $finduser = User::where('email', $user->email)->first();
        if ($finduser) {
            //if the user exists, login and show dashboard
            Auth::login($finduser);
            return redirect('/home');
        } else {

            return redirect('/login');
            // //user is not yet created, so create first
            // $newUser = User::create([
            //     'names' => $user->name,
            //     'firstname' => '',
            //     'lastname' => '',
            //     'email' => $user->email,
            //     'google_id' => $user->id,
            //     'password' => Hash::make('onedigital123')
            // ]);

            // $newUser->save();
            // //login as the new user
            // Auth::login($newUser);
            // $newUser->assignRole('Socio Comercial');
            // //
            // //  $newUser->createToken(request()->device_name)->plainTextToken ;
            // // go to the dashboard
            // return redirect('/home');
        }
        //catch exceptions
    } catch (Exception $e) {
        dd($e->getMessage());
    }

});

Route::controller(App\Http\Controllers\UserController::class)->group(function () {
    Route::get('users-export', 'export')->name('users.export');
    Route::post('users-import', 'import')->name('users.import');

    Route::post('userImportGoogle', 'importGoogle');


});




//////////////////////////////////////////////////



Route::get('login/microsoft', function () {
    return Socialite::driver('microsoft')->redirect();
});

Route::get('login/microsoft/callback', function () {
    try {
        //create a user using socialite driver google
        $user = Socialite::driver('microsoft')->user();
        // if the user exits, use that user and login
        $finduser = User::where('email', $user->email)->first();
        if ($finduser) {
            //if the user exists, login and show dashboard
            Auth::login($finduser);
            return redirect('/home');
        } else {
            //user is not yet created, so create first
            $newUser = User::create([
                'names' => $user->name,
                'firstname' => '',
                'lastname' => '',
                'email' => $user->email,
                'google_id' => $user->id,
                'password' => Hash::make('onedigital123')
            ]);

            $newUser->save();
            //login as the new user
            Auth::login($newUser);
            $newUser->assignRole('Socio Comercial');
            //
            //  $newUser->createToken(request()->device_name)->plainTextToken ;
            // go to the dashboard
            return redirect('/home');
        }
        //catch exceptions
    } catch (Exception $e) {
        dd($e->getMessage());
    }
});


Route::get('google_sheet', [\App\Http\Controllers\GoogleSheetController::class, 'index']);


//925680958 936158747


