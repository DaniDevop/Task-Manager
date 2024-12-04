<?php

namespace App\Http\Controllers;

use App\Models\categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class categorieController extends Controller
{
    //
    public function listes_categorie(){
       
        $categorieAll = categorie::orderBy('id', 'DESC')->get();
        return view('admin.categorie.listes_categorie',compact('categorieAll'));
    }
    public function categories_taches_forms(Request $request){
       
        $data=$request->validate([
            'name'=>'required',
            'user_action'=>'required'
        ]);
        $categorie=categorie::create($data);
        if(!$categorie){
          return redirect()->back()->with('errorValidation','categorie');
        }
        toastr()->success("Catégorie crée avec success !");
        return redirect()->back();
    }

    public function view_update_categorie($id){
       
        $categorie=categorie::find($id);
        if(!$categorie){
            return redirect()->back();
        }
        return view('admin.categorie.update',compact('categorie'));
    }
    public function update_categorie(Request $request){
     
        $data=$request->validate([
            'name'=>'required',
            'user_action'=>'required',
            'id'=>'required',
        ]);
        $categorie=categorie::find($request->id);
        $categorie->name=$data['name'];
        $categorie->user_action=$data['user_action'];
        $categorie->updated_at=now();
        $categorie->save();
        if(!$categorie){
            toastr()->error("Une erreur c est produite veuillez rafraichir la page !");

            return redirect()->back()->with('error', 'success');

        }
        toastr()->success("Catégorie mise à jour avec success !");

        return redirect()->back();
    }
   
}
