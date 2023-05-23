<?php

namespace App\Http\Controllers;

use App\Models\Product;

use Illuminate\Http\Request;

class AccueilController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('accueil', compact('products'));
    }

public function productCart()
{
    return view('cart');
}
public function addProducttoCart($id)
{
    $product = Product::findOrFail($id);
    $cart = session()->get('cart', []);
    if(isset($cart[$id])) {
        $cart[$id]['quantity']++;
    } else {
        $cart[$id] = [
            "name" => $product->name,
            "quantity" => 1,
            "price" => $product->price,
            "description" => $product->description
        ];
    }
    session()->put('cart', $cart);
    return redirect()->back()->with('success', 'Product has been added to cart!');
}

public function updateCart(Request $request)
{
    if($request->id && $request->quantity){
        $cart = session()->get('cart');
        $cart[$request->id]["quantity"] = $request->quantity;
        session()->put('cart', $cart);
        session()->flash('success', 'Product added to cart.');
    }
}

public function deleteProduct(Request $request)
{
    if($request->id) {
        $cart = session()->get('cart');
        if(isset($cart[$request->id])) {
            unset($cart[$request->id]);
            session()->put('cart', $cart);
        }
        session()->flash('success', 'Product successfully deleted.');
    }
}
public function search(Request $request)
{
    $searchTerm = $request->input('search');
    $products = Product::where('name', 'like', '%' . $searchTerm . '%')->get();
    
    return view('accueil', compact('products'));
}
public function searchByPrice(Request $request)
{
    $minPrice = $request->input('minPrice');
    $maxPrice = $request->input('maxPrice');

    $products = Product::whereBetween('price', [$minPrice, $maxPrice])->get();

   
    return view('accueil', ['products' => $products]);
}

}
   



