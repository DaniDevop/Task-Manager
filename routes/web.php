<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\categorieController;
use App\Http\Controllers\tachesController;
use App\Http\Controllers\userController;
use App\Models\taches;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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


Route::get('login/',[userController::class,'login_users'])->name('auth.login');
Route::post('doLogin/users/',[userController::class,'doLogin'])->name('login.user');
Route::get('registerUser/',[userController::class,'register'])->name('register_user');



Route::post('create_user_register/',[userController::class,'create_user_compte'])->name('creation.compte.register');
Route::get('admin/view_register/',[userController::class,'view_register_members'])->name('view.register_members');
Route::post('changes_role-user/',[userController::class,'change_role_user'])->name('change.role.user');

Route::middleware(['auth.custom'])->group(function(){
    Route::get('/', function () {
        $numberUsers=User::count();
        $notification = taches::where('date_echeances', '<=', Carbon::now())->where('statut','Non-Finish')->where('user_id',Auth::id())->count();
        $numberTachesInvalide=taches::where('statut','Non-Finish')->where('confirmation','NON')->count();
        $numberTachesFinish=taches::where('statut','Finish')->where('confirmation','Confirmer')->count();
        $tachesConfirmationNumber=taches::where('statut','Finish')->where('confirmation','NON')->count();
        $tachesConfirmation=taches::where('statut','Finish')->where('confirmation','NON')->get();
        $tachesAll=taches::has('user');
        return view('index',compact('notification','tachesConfirmationNumber','tachesAll','tachesConfirmation','numberUsers','numberTachesInvalide','numberTachesFinish'));
    })->name('dashboard');
// ADMIN
Route::get('admin/listes_membres/',[userController::class,'liste_membres'])->name('view_listes_membres');
Route::get('admin/validate_compte/{id}',[userController::class,'validateCompte_view'])->name('certificate.compte');
Route::post('admin/validate-information/',[userController::class,'validate_information_compte'])->name('validate_information_compte');
Route::get('admin/taches_membres/{id}',[tachesController::class,'details_taches_membres'])->name('membres_details_taches');
// User
Route::get('user/update_view/',[userController::class,'update_users_view'])->name('update.view.user');
Route::post('admin/update_my_profile/',[userController::class,'update_profile'])->name('update.informations.user');
Route::get('user/update_password/',[userController::class,'view_update_password'])->name('update.view.password');
Route::post('admin/update_my_password/',[userController::class,'update_password'])->name('update.password.users');
Route::get('user/desactive_compte/{id}',[userController::class,'desactive_compte'])->name('delete.users_compte');

// Taches
Route::get('taches_view_liste',[tachesController::class,'listes_all_taches'])->name('taches_all');
Route::get('new_taches_',[tachesController::class,'view_creation_taches'])->name('new.taches');
Route::post('create_taches_forms/',[tachesController::class,'create_new_taches'])->name('create.taches');
Route::get('update_taches/{id}',[tachesController::class,'update_taches_view'])->name('update.taches.view');
Route::post('update_taches_forms/',[tachesController::class,'update_taches_traitement'])->name('update.taches.forms');
Route::get('affectation_taches',[tachesController::class,'view_affectation'])->name('affectation.views');
Route::post('create_affectation_taches/',[tachesController::class,'affectation_taches_traitement'])->name('affectation.users.taches');
Route::get('taches/retirer_taches/{id}',[tachesController::class,'retire_taches_membres'])->name('retire.taches.membres');
Route::get('validation_taches_view/',[tachesController::class,'listes_taches_valide'])->name('listes_invalide');
Route::get('confirmation_taches/{id}',[tachesController::class,'confirmation_taches'])->name('valide_taches');
Route::get('taches_view_personnelle/',[tachesController::class,'users_taches_validate_view'])->name('view.personne_taches');
Route::get('taches_en_cours_personnelle/',[tachesController::class,'taches_personnel_view'])->name('view.personne_taches_non_validate');
Route::get('taches/finish/{id}',[tachesController::class,'taches_finish_users'])->name('fin.taches');
Route::get('impression_liste_membres/',[tachesController::class,'impression_liste_membres'])->name('user.impression_listes');
Route::get('impression_liste_taches/',[tachesController::class,'impression_liste_taches'])->name('user.impression_taches');

// Categories
Route::get('liste_categorie/',[categorieController::class,'listes_categorie'])->name('categorie.liste');
Route::post('create_categorie/',[categorieController::class,'categories_taches_forms'])->name('new.categorie');
Route::get('categorie_update/{id}',[categorieController::class,'view_update_categorie'])->name('view.update');
Route::post('categorie_update_forms/',[categorieController::class,'update_categorie'])->name('forms.update');
// DECONNEXION
Route::delete('admin/logout/',[userController::class,'logout_users'])->name('logout.users');

});