<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tasks;
use Illuminate\Support\Facades\Cache;

class TaskController extends Controller
{
    //
    public function AjouterForm(){
        return view("TaskViews.formAdd");
    }

    public function ListTask(){
        $tasks = Tasks::all(); 
        foreach($tasks as $task){
            $cachePrefix = "task_".$task->id;
            if(Cache::has($cachePrefix)){
                Cache::get($cachePrefix);
            }
            else{
                Cache::put($cachePrefix, $task, 10);
            }
        }

        return view("TaskViews.tasksList",compact("tasks"));
    }

    /* ----- CRUD ----- */

    /* 1 - CREATE  */
    public function Create(Request $request){
        $request->validate(
            [
                'txtNom' => 'required',
                'txtDescription' => 'required',
                'txtDuree' => 'required|integer|min:1',
            ],
            [
                'txtNom.required' => 'Le champ nom est requis.',
                'txtDescription.required' => 'Le champ description est requis.',
                'txtDuree.required' => 'Le champ durée est requis.',
                'txtDuree.integer' => 'Le champ durée doit être un nombre entier.',
                'txtDuree.min' => 'Le champ durée doit être d\'au moins :min.',
            ]
        );        

        $tache = new Tasks();
        $tache->task = $request->txtNom;
        $tache->description = $request->txtDescription;
        $tache->duree = $request->txtDuree;

        if($tache->duree>=1){
            $tache->save();
            return redirect()->route('ajouter')->with("statut","La tache est bien ajouté avec succés !");
        }
    }


    /* 2 - UPDATE  */
    public function ModifierPage($id){
        $tacheSearch = Tasks::find($id);
        return view("TaskViews.formModifier",compact("tacheSearch"));
    }

    public function Update(Request $request){
        $request->validate(
            [
                'txtNom'=>"required",
                'txtDescription'=>"required",
                'txtDuree'=>"required|integer|min:1"
            ]
        );

        $tache = Tasks::find($request->txtId);
        $tache->task = $request->txtNom;
        $tache->description = $request->txtDescription;
        $tache->duree = $request->txtDuree;

        if($tache->duree>=1){
            $tache->update();
            return redirect()->route('tasks')->with("statut","La tache est bien modifié avec succés !");
        }
    }


    /* 3 - DELETE  */
    public function Delete($id){
        $tache = Tasks::find($id);
        $tache->delete();

        return redirect()->route("tasks")->with("statut","La tache est bien supprimé avec succés !");
    }
}
