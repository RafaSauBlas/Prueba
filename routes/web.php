<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;



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
Route::middleware('guest')->group(function (){
  Route::get('login', function (Request $request) {

    session(['IPVPN' => $request->ip()]);
    if($request->ip() == '127.0.0.1'){

        return view('login-view');
    }


    else{
        return "NECESITA ENTRAR POR VPN AMIGO";

    }
    })->name('login');
});


// Route::get('/generarToken', function () {
//     if($request->ip() == '"IP VPN"'){

//         return view('generarToken');
//     }
//     else{
//         return "A CHINGAR A SU MADRE PUTO";

//     }
// });



// Route::get('/generarToken', function () {
//         return view('generarToken');
//     });


Route::post('generarToken', [AuthController::class, 'GenerarTocken']);


Route::post('/tokenUser', [AuthController::class, 'tokenSendUserLow']);


Route::get('/register', function () {
    return view('register-view');
});

Route::get('home', [AuthController::class, 'index2'])->middleware('auth');

Route::get('code/{email}', function ($email) {
     return view('code-view')->with('email', $email);
    // return "entro aqui";
})->name('code');

Route::fallback(function () {
    return redirect('/login');
});

Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');


Route::get('/tokenLogout', [AuthController::class, 'logoutDos'])->middleware('auth');



Route::post('/register', [AuthController::class, 'register']);

Route::post('code/login-with-code', [AuthController::class, 'loginWithCode']);




Route::get('editarUser/{id}', [AuthController::class, 'vistaEditar']);





//RUTA DEL USUARIO PENDEJO PARA EDITAR
Route::get('editarUserBajo/{id}', [AuthController::class, 'vistaEditarDos']);
Route::post('/tokenUserLow', [AuthController::class, 'tokenSendUserLow']);



Route::get('tokeneliminar/{id}', [AuthController::class, 'vistaEliminarDos']);

Route::post('/EliminarToken', [AuthController::class, 'tokenEliminar']);














Route::put('/Editar', [AuthController::class, 'update']);

Route::delete('/Eliminar', [AuthController::class, 'eliminar']);

Route::post('/sendToken', [AuthController::class, 'tokenSocket']);

Route::get('/pruebaAlerta', [AuthController::class, 'alertitaPutita']);




// Route::post('/sendMeToken', [AuthController::class, 'otroMetodo']);


// Route::get('/register', function () {
//     return view('login')->with('user', Auth::user());
// })->middleware('auth');


Route::post('/message', function (Request $request) {

    $message = [
        'user'=>auth()->user()->nombre,
        'message'=>$request->input('message'),    ];

    $success = event(new App\Events\EnviarToken($message));
    return $success;
});
