<?php

namespace App\Http\Controllers;

use App\Models\chefs;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Foods;
use App\Models\Order;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{

    //user part
    public function user()
    {
        $data = user::all();
        return view("admin.users", compact("data"));
       
    }
    public function deleteuser($id)
    {
        $data = user::find($id);
        $data->delete();
        return redirect()->back();
    }

    // FoodMenu Part
    public function foodmenu()
    {
        $data = foods::all();
        return view("admin.foodmenu", compact("data"));
    }
    public function uploadfoodmenu(Request $request)
    {

        $data = new foods;

        $image = $request->image;

        $imagename = time() . '.' . $image->getClientOriginalExtension();

        $request->image->move('foodimage', $imagename);

        $data->image = $imagename;
        $data->title = $request->title;
        $data->price = $request->price;
        $data->description = $request->description;

        $data->save();

        return redirect()->back();
    }

    public function deletemenu($id)
    {
        $data = foods::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function editfoodmenu($id)
    {
        $data = foods::find($id);
        return view("admin.editmenu", compact("data"));
    }

    public function update(Request $request, $id)
    {
        $data = foods::find($id);

        $image = $request->image;

        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('foodimage', $imagename);
            $data->image = $imagename;
        }

        $data->title = $request->title;

        $data->price = $request->price;

        $data->description = $request->description;

        $data->save();

        return redirect()->back();

        return view("admin.editmenu", compact("data"));
    }

    // Reservation part

    public function reservation(Request $request)
    {
        $usertype = Auth::user()->usertype;

        if ($usertype == '1') {

            return view('admin.adminhome');
        } else {
        $data = new Reservation;

        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->guest = $request->guest;
        $data->date = $request->date;
        $data->time = $request->time;
        $data->message = $request->message;

        $data->save();

        return redirect()->back();
        }
    }

    public function viewreservation()
    {
        if(Auth::id()){
        $data = reservation::all();
        return view("admin.reservation", compact("data"));
        }
        else
        {
            return redirect('login');
        }
    }


    // Chef Part

    public function viewchefs()
    {
         if(Auth::id()){
        $data = chefs::all();
        return view("admin.chefs", compact("data"));
    }
    else
    {
        return redirect('login');
    }
    }

    public function chefinfoupload(Request $request)
    {
        $data = new Chefs;

        $image = $request->image;

        $imagename = time() . '.' . $image->getClientOriginalExtension();

        $request->image->move('chefimage', $imagename);

        $data->image = $imagename;
        $data->name = $request->name;
        $data->speciality = $request->speciality;
        $data->save();

        return redirect()->back();

        return view("admin.chefinfoupload");
    }

    public function deletchefinfo($id)
    {
        $data = chefs::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function updatechefinfo($id)
    {
        $data = chefs::find($id);
        return view("admin.editchefinfo", compact("data"));
    }
    public function editchefinfo(Request $request, $id)
    {
        $data = chefs::find($id);

        $image = $request->image;

        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('chefimage', $imagename);
            $data->image = $imagename;
        }
        $data->name = $request->name;
        $data->speciality = $request->speciality;
        $data->save();
        return redirect()->back();
        return view("admin.editchefinfo", compact("data"));
    }

    // food orders part

    public function orders()
    {
        $data = Order::all();

        return view('admin.orders',compact("data"));
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $data = Order::where('username','Like','%'.$search.'%')->orWhere('foodname','Like','%'.$search.'%')->orWhere('address','Like','%'.$search.'%')->get();
        return view('admin.orders',compact("data"));
    }

}
