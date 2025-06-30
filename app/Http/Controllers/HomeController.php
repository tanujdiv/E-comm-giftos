<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use function PHPUnit\Framework\returnCallback;



class HomeController extends Controller
{
    //
    public function index(){
        $user=User::where('usertype','user')->get()->count();
        $product=Product::all()->count();
        $order=Order::all()->count();
        $delivered=Order::where('status','delivered')->get()->count();
        return view('admin.index', compact('user','product','order','delivered'));
    }

    public function home(){
        $product=Product::all();
        if(Auth::id()){
             $user=  Auth::user();
        $userid=$user->id;
        $count = Cart:: where ('user_id',$userid)->count();
        }
        else{
            $count=null;
        }
        return view('home.index',compact('product','count'));
    }

    public function login_home(){
        $product=Product::all();
        $user=  Auth::user();
        $userid=$user->id;
        $count = Cart:: where ('user_id',$userid)->count();
        return view('home.index',compact('product','count'));
    }

    public function product_details($id){
        $data=Product::find($id);
        if(Auth::id()){
         $user=  Auth::user();
        $userid=$user->id;
        $count = Cart:: where ('user_id',$userid)->count();
        }
        else{
            $count=null;
        }
        return view('home.product_details',compact('data','count'));
    }

    public function add_cart($id){
        $product_id=$id;
        $user=Auth::user();
        $user_id=$user->id;
        $data=new Cart();
        $data->user_id=$user_id;
        $data->product_id=$product_id;
        $data->save();
        toastr()->timeOut(5000)->closeButton()->success("Product Added to The Cart Successfully.");

        return redirect()->back();
    }

    public function mycart(){
        if(Auth::id()){
            $user=Auth::user();
            $userid=$user->id;
            $count= Cart::where('user_id',$userid)->count();

            $cart=Cart::where('user_id',$userid)->get();
        }
        return view('home.mycart',compact('count','cart'));
    }

    public function delete_cart($id){
        $cart=Cart::find($id);
        $cart->delete();
        toastr()->timeOut(5000)->closeButton()->warning("Product is Removed From Your Card");
        return redirect()->back();
    }

    public  function comfirm_order(Request $request){

        $name=$request->name;
        $address=$request->address;
        $phone=$request->phone;
        $userid=Auth::user()->id;

        $cart=Cart::where('user_id',$userid)->get();

        foreach ($cart as $carts) {
             $order=new Order();

             $order->name=$name;
             $order->rec_address=$address;
             $order->phone=$phone;

             $order->user_id=$userid;

             $order->product_id= $carts->product_id;

             $order->save();         


        }

            $cart_remove=Cart::where('user_id',$userid)->get();
            foreach ($cart_remove as $remove) {
                $data=Cart::find($remove->id);
                $data->delete();
            }
         toastr()->timeOut(5000)->closeButton()->success("Product Order Successfully");
            return redirect()->back();
       
    }

    public function  my_order(){
        if(Auth::id()){
            $user=Auth::user();
            $userid=$user->id;
            $count=Cart::where('user_id',$userid)->get()->count();
        }
        else{
            $count=null;
        }

        $user=Auth::user()->id;

        $order=Order::where('user_id',$user)->get();



        return view('home.order',compact('count','order'));
    }


    public  function payment($value){
        return $value;
    }

    public function shop(){
        $product=Product::all();
        if(Auth::id()){
        $user=Auth::user()->id;
        $count=Cart::where('user_id',$user)->count();
    
        }
        else{
            $count=null;
        }
        return view('home.shop',compact('count','product'));
    }

     public function why(){
        if(Auth::id()){
        $user=Auth::user()->id;
        $count=Cart::where('user_id',$user)->count();
    
        }
        else{
            $count=null;
        }
        return view('home.why',compact('count'));
     }

     public function testimonial(){
        if(Auth::id()){
        $user=Auth::user()->id;
        $count=Cart::where('user_id',$user)->count();
    
        }
        else{
            $count=null;
        }
        return view('home.testimonial',compact('count'));
     }

     public function contact(){
        if(Auth::id()){
        $user=Auth::user()->id;
        $count=Cart::where('user_id',$user)->count();
    
        }
        else{
            $count=null;
        }
        return view('home.contact',compact('count'));
     }

}
