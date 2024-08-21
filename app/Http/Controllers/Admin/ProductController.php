<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use Illuminate\Support\Facades\File;
class ProductController extends Controller
{
    public function index(Request $request)
{
    $search = $request->input('search');

    if ($search) {
        $products = Product::where('name', 'like', '%' . $search . '%')->paginate(10);
    } else {
        $products = Product::with('category')->paginate(5); 
    }

    return view('admin.products.index', compact('products'));
}
    public function create()
    {  
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {  
       
        $request->validate([
            'category_id' => 'required',
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:products,slug',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
           
        ]);
        $products = new Product();  
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/uploads/products'), $filename);
            $products->image = $filename;
        }
        $products->category_id = $request->input('category_id');
        $products->name = $request->input('name');
        $products->slug = $request->input('slug');
        $products->description = $request->input('description');
        $products->price = $request->input('price');
        $products->quantity = $request->input('quantity');
        $products->status = $request->input('status');
        $products->save();
        return redirect('/products')->with('status','Products Added Successfully');
     
    }

    public function show($id)
    {
        $product = Product::findOrFail($id); 
        return view('admin.products.show', compact('product'));
    }

    public function edit($id)
    {
        $categories = Category::all();
        $product = Product::find($id);
        return view('admin.products.edit', compact('product','categories'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        if($request->hasFile('image')){
            $path = 'assets/uploads/products/'.$product->image;
            if(File::exists($path)){
              File::delete($path);
            }
            $file= $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename =time().'.'.$ext;
            $file->move('assets/uploads/products',$filename);
            $product->image = $filename;
        }  
        $request->validate([
            'category_id' => 'required',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'image' => '',
        ]);   
      
      $product->category_id = $request->input('category_id');
      $product->name = $request->input('name');
      $product->slug = $request->input('slug');
      $product->description = $request->input('description');
      $product->price = $request->input('price');
      $product->quantity = $request->input('quantity');
      $product->status = $request->input('status');
      $product->save();
    
        return redirect('/products')->with('status', 'Products updated successfully');
             
    }

    public function destroy($id)
    {
        $product =Product::find($id);   
        if ($product->image) {
            $path = 'assets/uploads/products/'.$product->image;
            if (File::exists($path)) {
             File::delete($path);
                }
               }
            $product->delete();
        return redirect('/products')->with('status','Products Deleted Successfully');
    }

}
