<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Provider;
use App\Milon\Barcode\DNS1D;
use Picqer;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
            $this->middleware('auth'); 
            $this->middleware('can:product.create')->only(['create', 'store']); 
            $this->middleware('can:product.index')->only(['index']); 
            $this->middleware('can:product.edit')->only(['edit','update']); 
            $this->middleware('can:product.show')->only(['show']); 
            $this->middleware('can:product.destroy')->only(['destroy']);

            $this->middleware('can:change.status.products')->only(['change_status']); 
            
    }


    public function index()
    {
        $products = Product::all();
        //dd($products);
        return view('admin.product.index', compact('products'));
        //return view('pruebas', compact('products'));

    }

    public function create()
    {   
        $categories = Category::get();
        $providers = Provider::get();
        return view('admin.product.create', compact('categories', 'providers'));

    }

    public function store(StoreRequest $request)
    {
        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $image_name = time().'_'.$file->getClientOriginalName();
            $file->move(public_path("/image"), $image_name);
           
        }

        $product = Product:: create($request->all()+[
            'image' => $image_name,
        ]);
 
        if ($request->code == "") {
            
            $numero = $product->id;
            $numeroConCeros = str_pad($numero, 8, "0", STR_PAD_LEFT);
            $product->update(['code' =>$numeroConCeros]);    
        }
        
        return redirect()->route('products.index');
        
    }
 
    public function show(Product $product)
    {
        // $numero = 500;
        // $numeroConCeros = str_pad($numero, 8, "0", STR_PAD_LEFT);

        // dd($numeroConCeros);
        return view('admin.product.show', compact('product'));
    }

    public function edit(Product $product)
    {   
        $categories = Category::get();
        $providers = Provider::get();
        return view('admin.product.edit', compact('product', 'categories', 'providers'));

    }

    public function update(UpdateRequest $request, Product $product)
    {
        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $image_name = time().'_'.$file->getClientOriginalName();
            $file->move(public_path("/image"), $image_name);
           
        }

        $product->update($request->all()+[
            'image' => $image_name,
        ]);
      
        return redirect()->route('products.index');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }

    public function change_status(Product $product)
    {
        if ($product->status == 'ACTIVE') {
            $product->update(['status'=>'DESACTIVATED']);
            return redirect()->back();
        }else{
            $product->update(['status'=>'ACTIVE']);
            return redirect()->back();
        }
    }

    public function get_products_by_barcode(Request $request)
    {
       if($request->ajax()){

            $products = Product::where('code', $request->code)->firstOrFail();
            return response()->json($products);

       }
    }

    public function get_products_by_id(Request $request)
    {
       if($request->ajax()){

            $products = Product::firstOrFail($request->$product_id);
            return response()->json($products);

       }
    }




    
}
