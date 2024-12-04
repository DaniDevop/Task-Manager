<?php

namespace App\Http\Controllers;

use App\Models\categorie;
use App\Models\taches;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Gate;

class tachesController extends Controller
{
    //
    public function listes_all_taches(){
        $tachesAll=taches::OrderBy('id','desc')->get();
         return view('admin.taches.liste_taches',compact('tachesAll'));
    }


    public function view_creation_taches(){
        $categorieAll=categorie::all();
        return view('admin.taches.creation_taches',compact('categorieAll'));
    }
    public function create_new_taches(Request $request){
        $data=$request->validate([
            'taches_name'=>'required',
            'date_echeances'=>'required',
            'user_action'=>'required',
            'categorie_id'=>'required|exists:categories,id',
        ]);
        
        $taches=new taches();
        $taches->taches_name=$data['taches_name'];
        $taches->date_echeances=$data['date_echeances'];
        $taches->categorie_id=$data['categorie_id'];
         $taches->user_action=$data['user_action'];
         $taches->confirmation='NON';
         $taches->statut='Non-Finish';
         $taches->date_fin='';
         $taches->save();
        if(!$taches){
            toastr()->error('Taches nom crée , veuillez recommencer!');

          return redirect()->back();
        }
        toastr()->info('Taches crée avec success !');
        return redirect()->back();
    }
    public function update_taches_view($id){
        $taches=taches::find($id);
        $categorieAll=categorie::all();
        if(!$taches){
            return redirect()->back()->with('errorTaches','categorie');
        }
        return view('admin.taches.update_taches',compact('taches','categorieAll'));

    }
    public function update_taches_traitement(Request $request){
        $data=$request->validate([
            'taches_name'=>'required',
            'date_echeances'=>'required',
            'categorie_id'=>'required|exists:categories,id',
            'user_action'=>'required',
            'id'=>'required'
        ]);
        $taches=taches::find($request->id);
        $taches->taches_name=$data['taches_name'];
        $taches->date_echeances=$data['date_echeances'];
         $taches->user_action=$data['user_action'];
         $taches->updated_at=now();
         $taches->save();
         toastr()->info('Taches mises à jour avec success !');
         return redirect()->back();
    }

    public function view_affectation(){
      
        $tachesAll = Taches::where('user_id', '!=', null)->where('statut','Non-Finish')->get();
        $numberTachesAttribue = Taches::where('user_id', '!=', null)->count();
        $user = User::all();
        $tachesAffectation = Taches::where('user_id', null)->where('statut','Non-Finish')->get();
        return view('admin.taches.affectation',compact('numberTachesAttribue','tachesAll','user','tachesAffectation'));        
    }
    public function affectation_taches_traitement(Request $request){
        $data=$request->validate([
            'tache_id'=>'required|exists:taches,id',
            'user_id'=>'required|exists:Users,id'
        ]);
        $user=User::find($request->user_id);
        $taches=taches::find($request->tache_id);
        if(!$user || !$taches){
            toastr()->error('Une erreur c est produite !');
           return redirect()->back();
        }
        $taches->user_id=$user->id;
        $taches->save();
        toastr()->info('Taches affectée avec success !');
        return redirect()->back();
    }
    public function retire_taches_membres($id){
        $taches=taches::find($id);
        if(!$taches){
          return redirect()->back()->with('error_retire','une erreur est survenue');
        }
        $taches->user_id=null;
        $taches->save();
        return redirect()->back()->with('succes_operation','ok');

    }
  

    public function details_taches_membres($id){
        $tachesAll=taches::where('user_id',$id)->get();
        $currentDateTime = Carbon::now();
        $dateCurrent = $currentDateTime->format('Y-m-d H:i:s');
        return view('admin.taches.taches_membres',compact('tachesAll','dateCurrent'));
    }
    // Retirer une taches
    public function retirer_taches_membres($id){
       
        $taches=taches::find($id);
        if(!$taches){

        }
        $taches->user_id=null;
        return redirect()->back()->with('succes','retirer');
    }

    // Listes des taches valides
    public function listes_taches_valide(){
        $tachesValide=taches::where('statut','Finish')->where('confirmation','NON')->get();
        return view('admin.taches.listes_taches_valide',compact('tachesValide'));
    }

    // Confirmation d'une taches
    public function confirmation_taches($id){
        if(!Gate::allows('acces_data')){
            abort(403);
       }
        $taches=taches::find($id);
        if(!$taches){
            toastr()->error('Une erreur c est produite  !');
            return redirect()->back();
        }
        $taches->confirmation="Confirmer";
        $taches->Bonus=+1;
        $taches->save();
        toastr()->info('La confirmation à été envoyé !');
        return redirect()->back();

    }

    // Voirs ses taches personnelles users comme admin
    public function taches_personnel_view(){
        $user=Auth::user();

        Session::put('user',$user);
        $storedUser = Session::get('user');
        $tachesAll = Taches::where('user_id', $storedUser->id)
        ->where(function ($query) {
            $query->where('statut', 'Non-Finish')
            ->OrWhere('statut','Finish')
                ->where('confirmation', 'NON');
        })
        ->get();
       

            
         $tachesNumber=taches::where('statut','Non-Finish')->where('user_id',Auth::id())->count();
        return view('admin.user.user_taches_perso',compact('storedUser','tachesAll','tachesNumber'));

    }
    public function users_taches_validate_view(){
        $tachesAll=taches::where('statut','Finish')->where('confirmation','Confirmer')->get();
        $tachesNumber=taches::where('statut','Finish')->where('confirmation','Confirmer')->count();
        return view('admin.user.taches_users_validate',compact('tachesAll','tachesNumber'));
    }
    public function taches_finish_users($id){
        $taches=taches::find($id);
        if(!$taches){

        }
        $taches->statut="Finish";
        $taches->save();
        $taches->date_fin=now();
        return redirect()->back();
    }

    public function impression_liste_membres(){
        $user=User::all();
        $data['user']=$user;
        $date=now();
        $data['date']=$date;
        $pdf = PDF::loadView('admin.user.impression_listes', $data);
        return $pdf->stream();
    }
    public function impression_liste_taches(){
        $taches=taches::whereNotNull('user_id')->get();
        $data['taches']=$taches;
        $date=now();
        $data['date']=$date;
        $pdf = PDF::loadView('admin.taches.impression_taches', $data);
        return $pdf->stream();
    }
}
