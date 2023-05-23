<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderConfirmationMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Illuminate\Http\Response;
use PDF;

use App\Models\Product;
use App\Models\Order;

class CommandesController extends Controller
{
    public function index(Request $request)
{
    
    $cart = session('cart');

    
    if (!empty($cart)) {
        
        $orders = [];

        foreach ($cart as $productId => $details) {
           
            $product = Product::find($productId);

            
            $order = new Order();
            $order->product_id = $productId;
            $order->product_name = $product->name;
            $order->product_price = $product->price;
            $order->quantity = $details['quantity'];
            $order->total_amount = $product->price * $details['quantity'];

            
            $orders[] = $order;
        }
    } else {
        $orders = [];
    }
    
  
    return view('commandes', compact('orders'));
}


public function generatePDF()
{
    $cart = session('cart');

    if (!empty($cart)) {
        $orders = [];

        $totalAmount = 0; // Initialize total amount

        foreach ($cart as $productId => $details) {
            // Add logic to fetch product details based on the $productId
            // For example:
            $product = Product::find($productId);

            $order = [
                'product_name' => $product->name,
                'product_price' => $product->price,
                'quantity' => $details['quantity'],
                'total_amount' => $product->price * $details['quantity'],
            ];

            $orders[] = $order;

            $totalAmount += $order['total_amount']; // Accumulate total amount
        }

        $data = [
            'orders' => $orders,
            'totalAmount' => $totalAmount,
        ];

        $pdf = PDF::loadView('pdf.order', $data);

        return $pdf->stream('order.pdf');
    }
}

    
}



