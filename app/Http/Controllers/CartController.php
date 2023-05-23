<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Cart;
use App\Models\Product;
class CartController extends Controller
{
    public function addToCart(Request $request, $product)
    {   
        $productId = $request->input('product_id');
        $product = Product::find($productId);

        if (!$product) {
            return redirect()->back()->with('error', 'Produit introuvable');
        }

        $cartItem = Cart::where('product_id', $productId)
                        ->where('user_id', auth()->id())
                        ->first();

        if ($cartItem) {
        
            $cartItem->quantity += 1;
            $cartItem->save();
        } else {
        
            $cartItem = new Cart();
            $cartItem->product_id = $productId;
            $cartItem->user_id = auth()->id();
            $cartItem->quantity = 1;
            $cartItem->save();
        }

        return redirect()->back()->with('success', 'Produit ajouté au panier');
    }

}