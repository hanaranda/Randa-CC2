<?php 
namespace App\Http\Controllers;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ProductsImport;
use App\Exports\ProductsExport;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;



class ProductsController extends Controller
{
    public function index()
    {
        
        $products = Product::all();
        return view('products.index', compact('products'));
        
    }

    public function create()
    {
        
        $categories = Category::all();

        return view('products.create', compact('categories'));
      
    }
    public function store(Request $request)
  
     
        {$validatedData = $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|numeric',
            'description' => 'required',
            'category' => 'required|exists:categories,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            
        ]);
    
        $product = new Product;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $publicPath = public_path('public/produits');
            if (!file_exists($publicPath)) {
                mkdir($publicPath, 0777, true);
            }
            $image->move($publicPath, $imageName);
            $product->image = $imageName;
        }
        
        $product->name = $validatedData['name'];
        $product->price = $validatedData['price'];
        $product->category_id = $validatedData['category'];
        $product->description = $validatedData['description'];
        
    
          
    
        if ($product->save()) {
            return redirect()->route('products.index')->with('success', 'Product has been added successfully');
        } else {
            return back()->with('error', 'Error in adding product');
        }
    
    }
    
    public function show($id)
    {
        
        $product = Product::findOrFail($id);
            return view('products.show', compact('product'));
        
    }

    public function edit($id)
    {
       
     $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }
       

    public function update(Request $request, $id)
    {
       
           
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
           
           
        ]);

        $product = Product::findOrFail($id);
        $product->update($request->all());

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }
    

    public function destroy($id)
    {
        
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
        }
       

        public function export()
        {
            return Excel::download(new ProductsExport, 'products.xlsx');
        }
      
        /**
        * @return \Illuminate\Support\Collection
        */
        public function import() 
        {
            Excel::import(new ProductsImport,request()->file('file'));
                   
            return back();
        }
 
}


