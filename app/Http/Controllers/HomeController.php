<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

use App\Models\Foods;

use App\Models\Chefs;

use App\Models\Cart;

use App\Models\Order;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::id()) {

            return redirect('redirects');
        }

        $data = foods::all();
        $data2 = Chefs::all();

        return view("home", compact("data", "data2"));
    }

    public function redirects()
    {
        $data = foods::all();
        $data2 = chefs::all();

        $usertype = Auth::user()->usertype;
        if ($usertype == '1') {

            return view('admin.adminhome');
        } else {
            // dd(Auth::user());

            $user_id = Auth::id();

            $count = cart::where('user_id', $user_id)->count();

            return view('home', compact("data", "data2", 'count'));
        }
    }

    // add cart

    public function addcart(Request $request, $id)
    {
        if (Auth::id()) {
            $user_id = Auth::id();
            $food_id = $id;
            $quantity = $request->quantity;

            $cart = new Cart;

            $cart->user_id = $user_id;
            $cart->food_id = $food_id;
            $cart->quantity = $quantity;

            $cart->save();

            return redirect()->back();
        } else {
            return  redirect('/login');
        }
    }

    public function showcart(Request $request, $id)
    {
        $count = cart::where('user_id', $id)->count();

        if (Auth::id() == $id) {

            $data2 = Cart::select('*')->where('user_id', '=', $id)->get();

            $data = cart::where('user_id', $id)->join('foods', 'carts.food_id', '=', 'foods.id')->get();

            return view('showcart', compact('count', 'data', 'data2'));
        } else {
            return redirect()->back();
        }
    }

    public function cartremove($id)
    {
        $data = Cart::find($id);
        $data->delete();

        return redirect()->back();
    }

    //order food

    public function orderconfirm(Request $request)
    {
        foreach ($request->foodname as $key => $foodname) {
            $data = new Order;
            $data->foodname = $foodname;
            $data->price = $request->price[$key];
            $data->quantity = $request->quantity[$key];
            $data->username = $request->username;
            $data->phone = $request->phone;
            $data->address = $request->address;

            $data->save();
        }
        return redirect()->back();
    }
}
