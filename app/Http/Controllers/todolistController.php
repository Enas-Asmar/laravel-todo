<?php

namespace App\Http\Controllers;

use App\Models\todolist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class TodolistController extends Controller
{
     
    public function showAllData(){
        return view('fetchedData')->with('TodoArr',todolist::all());
    }


    public function delete($id){
        todolist::destroy(array('id',$id));
        return redirect('/');
    }

    public function create(){
        return view('createView');
    }

    public function todo_submit(Request $req){
        

        $todo = new todolist;
        $todo->name = $req->input('name');
        $todo->priority=$req->input('priority');
        $todo->save();
        return redirect('/');
    }

    public function edit($id){
          
         return view('edit_todo')->with('TodoArr_name',todolist::find($id));
    }

    public function edit_submit(Request $req, $id){

       
         $todo = todolist::find($id);
         $todo->name = $req->input('name');
         $todo->priority=$req->input('priority');
         $todo->save();
         return redirect('/');
    }

    public function search(Request $req){
        $search =$req->get('search');
        $posts = DB::table('todolists')->where('name', 'LIKE', '%'.$search.'%')->paginate(2);
        return view('fetchedData',['TodoArr'=>$posts]);
    }
    public function order(){
       
       $order =DB::table('todolists')->orderByRaw("FIELD(priority, 'high', 'medium', 'low')")->get();
       return view('fetchedData')->with('TodoArr',$order);
    }
    public function completed($id){
        $todo = todolist::find($id);
        if($todo->done ==false){
            $todo->done =true;
            $todo->save();
            return redirect('/');
        }
        else{
            $todo->done =false;
            $todo->save();
            return redirect('/');
        }

    }
}




