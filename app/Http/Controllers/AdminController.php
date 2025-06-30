<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf;

class AdminController extends Controller
{
    //
    public function view_category(){
        $data=Category::all();
        return view('admin.category',["data"=>$data]);
    }

    public function add_category(Request $request){
        $category = new Category;
        $category->category_name = $request->category;
        $category->save();
        toastr()->timeOut(5000)->closeButton()->success('Category Added Successfully');
        return redirect()->back();
       
    }

    public function delete_category($id){
        $data=category::find($id);
        $data->delete();
        toastr()->timeOut(5000)->closeButton()->warning('Category Deleted Successfully');
        return redirect()->back();
    }

    public function edit_category($id){
        $data=category::find($id);
        return view('admin.update_category',["data"=>$data]);
    }

    public function update_category(Request $request, $id)
{
    $data =Category::find($id);
    $data->category_name = $request->category;
    $data->save();
    toastr()->timeOut(5000)->closeButton()->success('Category Updated Successfully');
    return redirect('view_category');
}

    public function add_product(){
        $category=Category::all();
        return view('admin.add_product',["data"=>$category]);

    }

    public function upload_product(Request $request){
        $data= new Product();

        $data->title=$request->title;
        $data->description=$request->description;
        $data->price=$request->price;
        $data->quantity=$request->quantity;
        $data->category=$request->category;

        $image = $request->image;
        if ($image) {
            $imagename= time().'.'.$image->getClientOriginalExtension();
            $request->image->move('products',$imagename);
            $data->image=$imagename;
        }
        $data->save();
        toastr()->timeOut(5000)->closeButton()->success("Product is Uploded.");
        return redirect()->back();

    }

    public function view_product(){
        $data=Product::paginate(10);
        return view ('admin.view_product',['product'=>$data]);
    }

    public function delete_product($id){
        $product = Product::find($id);
        $image_path=public_path('products/'.$product->image);
        if(file_exists($image_path)){
            unlink($image_path);
        }
        $product->delete();
        toastr()->timeOut(5000)->closeButton()->warning("Product is Deleted");
        return redirect()->back();
    }

    public function edit_product($id){
        $product=Product::find($id);
        $data=Category::all();
        return view('admin.update_product',["product"=>$product,"data"=>$data]);
    }

    public function update_product(Request $request , $id){
        $data=Product::find($id);
        $data->title=$request->title;
        $data->description=$request->description;
        $data->price=$request->price;
        $data->quantity=$request->quantity;
        $data->category=$request->category;

        $image = $request->image;
        if ($image) {
            $imagename= time().'.'.$image->getClientOriginalExtension();
            $request->image->move('products',$imagename);
            $data->image=$imagename;
        }
        $data->save();
        toastr()->timeOut(5000)->closeButton()->success("Product is Updated.");
        return redirect('view_product');
    }

    public function product_search(Request $request){
        $search=$request->search;
        $product=Product::where('title','LIKE','%'.$search.'%')->orWhere('category', 'LIKE' , '%'.$search.'%')->paginate(5);
        return view('admin.view_product',['product'=>$product , "search"=>$search]);
    }

    public function view_order(){
        
        $order= Order::all();

        return view('admin.view_order',compact('order'));
    }

    public function on_the_way($id){

        $data=Order::find($id);

        $data->status="On The Way";

        $data->save();

        toastr()->timeOut(5000)->closeButton()->success("Order Now On The Way");

        return redirect()->back();

    }


    public function delivered($id){

        $order=Order::find($id);

        $order->status="Delivered";

        $order->save();

        toastr()->timeOut(5000)->closeButton()->success("Order Is Delivered");

        return redirect()->back();
    }

    public function print_pdf($id){

        $data=Order::find($id);

        $pdf = Pdf::loadView('admin.invoice',compact('data'));

    return $pdf->download('invoice.pdf');

    }
}
