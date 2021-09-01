<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Foods;

class AdminController extends Controller
{
    public function user(){
        $data=user::all();
        return view("admin.users",compact("data"));
    }
    public function deleteuser($id){
        $data=user::find($id);
        $data->delete();
        return redirect()->back();
    }
    public function foodmenu(){
        $data=foods::all();
        return view("admin.foodmenu",compact("data"));
    }
    public function upload(Request $request){

       $data = new foods;

       $image = $request->image;

        $imagename=time().'.'.$image->getClientOriginalExtension();

        $request->image->move('foodimage',$imagename);

        $data->image=$imagename;

        $data->title=$request->title;

        $data->price=$request->price;

        $data->description=$request->description;

        $data->save();

        return redirect()->back();

    }

    public function deletemenu($id){
        $data=foods::find($id);
        $data->delete();
        return redirect()->back();
    }
    
    public function editmenu($id){
        $data=foods::find($id);
        return view("admin.editmenu",compact("data"));
    }

    public function update(Request $request ,$id){
        $data=foods::find($id);

        $image = $request->image;

        $imagename=time().'.'.$image->getClientOriginalExtension();

        $request->image->move('foodimage',$imagename);

        $data->image=$imagename;

        $data->title=$request->title;

        $data->price=$request->price;

        $data->description=$request->description;

        $data->save();

        return redirect()->back();



        return view("admin.editmenu",compact("data"));
    }



}
