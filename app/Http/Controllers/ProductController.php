<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Product; //step 1
use Session;

//use Illunminate\Support\Facades\DB;

class ProductController extends Controller
{
    //
    public function create(){
        return view('addProduct');
    }

    public function store(){ //step 2
        $r=request(); //step 3 get data from HTML
        $image=$r->file('product-image');
        $image->move('image',$image->getClientOriginalName());
        //images is the location
        $imageName=$image->getClientOriginalName();

        $addProduct=Product::create([ //step 4 bind data
            'id'=>$r->id, //add on
            'name'=>$r->fullname,
            'description'=>$r->fullname,
            'price'=>$r->price,
            'quantity'=>$r->quantity,
            'categoryID'=>$r->categoryID,
            'image'=>$imageName
        ]);
        Session::flash('success','Product insert successfully');
        Return redirect()->route('view.Product');// step 5 back to last page
    }

    public function view(){

        $products=Product::all();
        
        return view('product')->with('products',$products);
        //
    }

    public function views(){

        $products=Product::all();
        
        return view('userproduct')->with('products',$products);
        //
    }

    public function delete($id){

        $products =Product::find($id);
        
        $products->delete();
        
        return redirect()->route('view.Product');
        
        }

        public function viewlist(){

        $products=Product::all();
            
        return view('mainlist')->with('products',$products);
            
        }
        public function detail($id){//这个function是跟着web.php里的
       
            $products =Product::all()->where('id',$id);
            
            return view('productdetail')->with('products',$products);//这一行的productdetail是我们看到的UI
        }
    
        public function search(){
            $r=request();
            $keyword=$r->searchproduct;
            $products =DB::table('products')->where('name', 'like', '%' . $keyword . '%')
            ->orWhere('description', 'like', '%' . $keyword . '%')
            ->get();        
return view('mainlist')->with('products',$products);
}

public function edit($id){
       
    $products =Product::all()->where('id',$id);
    
    return view('editProduct')->with('products',$products);
}

public function update(){ //step 2
    $r=request(); //step 3 get data from HTML
    $image=$r->file('product-image');
    $image->move('image',$image->getClientOriginalName());
    //images is the location
    $imageName=$image->getClientOriginalName();

    $products =Product::find($r->id);
    $products->name=$r->fullname;
    $products->description=$r->description;
    $products->price=$r->price;
    $products->quantity=$r->quantity;
    $products->categoryID=$r->categoryID;
    $products->image=$imageName;
    $products->save();

    Session::flash('success','Product update successfully');
    Return redirect()->route('view.Product');// step 5 back to last page
}

}