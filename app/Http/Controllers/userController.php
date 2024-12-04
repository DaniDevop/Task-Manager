<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersAccountRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\role;
use App\Models\user_role;
use Illuminate\Support\Facades\Gate;

class userController extends Controller
{
    //
    public function liste_membres(){
        $userAll=User::OrderBy('id','DESC')->get();
        $numberUser=User::count();
      return view('admin.user.listes_membres',compact('userAll','numberUser'));
    }

    public function view_register_members(){
        $userAll=User::where('id','!=',Auth::user()->id)->get();
        return view('admin.user.register',compact('userAll'));
    }

    public function create_user_compte(UsersAccountRequest $request){
       
       
        if($request->password !=$request->password2){
            toastr()->error("Les mots de passes sont differents !");
            return redirect()->back();
        }
        $user=new User();
        $user->nom=$request->nom;
        $user->prenom=$request->prenom;
        $user->password=Hash::make($request->password);
        $user->email=$request->email;
        if ($request->user_role=="") {
            
            $user->user_role="USER";
        }
        $user->save();
        toastr()->info("Comptes crée avec succes !");
        return redirect()->route('auth.login');
    }

    public function validateCompte_view($id){
        if(!Gate::allows('acces_data')){
            abort(403);
       }
        $roles=role::all();
        $user=User::find($id);
        if(!$user){

        }
        return view('admin.user.validate_compte',compact('roles','user'));
    }
    public function validate_information_compte(Request $request){
        if(!Gate::allows('acces_data')){
            abort(403);
       }
        $data=$request->validate([
            'role_id'=>'required',
            'user_id'=>'required',
        ]);
        $user=User::find($request->id);
        if(!$user){
          
        }
            $new_user_role=new user_role();
        $new_user_role->role_id=$data['role_id'];
        $new_user_role->user_id=$data['user_id'];
        $new_user_role->save();
        if(!$new_user_role){
          return view("dashboard");
        }
        return redirect()->back()->with('sucess1','Top');
    }
    public function login_users(){

      return view('login');
    }

    public function register(){

        return view("register");
    }
    public function doLogin(Request $request){

        $request->validate([
            'identifiant'=>'required',
            'password'=>'required',
        ]);
        if(!Auth::attempt(['nom'=>$request->identifiant,'password'=>$request->password]) && !Auth::attempt(['email'=>$request->identifiant,'password'=>$request->password]) ){
            toastr()->error("Informations érronées !");
            return redirect()->back();
        }
        
        return redirect()->route('dashboard');
    }
    public function logout_users(){

        Auth::logout();
        return redirect()->route('auth.login');
    }
    public function update_users_view(){
        
        $user=User::find(Auth::id());
        return view('admin.user.update_profile',compact('user'));
    }

    public function update_profile(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'prenom' => 'required',
            'email' => 'required',
            'id' => 'required'
        ]);
    
        $user = User::find($request->id);
    
        if (!$user) {
            toastr()->error("Informations introuvables !");
            return redirect()->back();        }
    
        // Mettez à jour les autres champs
        $user->nom = $data['name'];
        $user->prenom = $data['prenom'];
        $user->email = $data['email'];
    
        $user->save();
    
        toastr()->success("Opération éffectué avec success!");
        return redirect()->back();    }

    public function view_update_password(){
        $user=User::find(Auth::id());

        return view('admin.user.changes_password',compact('user'));
    }

    public function update_password(Request $request){
        $data=$request->validate([
            'password' => 'required',
            'password2'=>'required',
            'id'=>'required',
        ]);
        //dd($data);
        $user=User::find($request->id);
        if($data['password'] !=$data['password2']){
            toastr()->error("Les mots de passes doivent entre similaires");
            return redirect()->back();

        }
        $user->password=Hash::make($data['password']);
        $user->save();
        toastr()->info("Mises à jour éffectué avec success !");
        return redirect()->back();
    }

    public function change_role_user(Request $request){

        $user=User::find($request->user_id);
        if(!$user){
            toastr()->error("Utilisateur introuvable");
            return redirect()->back();
        }
        $user->user_role=$request->role_name;
        $user->save();

        toastr()->info("Opération éffectué avec success !");
            return redirect()->back();
    }
    public function desactive_compte($id){
        if(!Gate::allows('acces_data')){
            abort(403);
       }
        $user=User::find($id);
        if(!$user){
            return redirect()->back()->with('error', 'Mots de passe bien mise à jour');

        }
        if($user->activation=="Desactivated"){
            $user->activation="Actived";
            $user->save();
            return redirect()->back()->with('normal', 'Compte désactivé avec success!');

        }
        $user->activation="Desactivated";
        $user->user_role=0;
        $user->save();
        return redirect()->back()->with('normal', 'Compte désactivé avec success!');

    }
    
}
