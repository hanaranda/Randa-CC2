
<style>
       .payment-amount {
     font-size: 30px;
     padding-left: 22%;
    }
 
    .container {
     display: flex;
     justify-content: center;
     align-items: center;
     height: 100vh;
    }
 
    .order-ticket {
     width: 600px;
     background-color: #f9f9f9;
     border: 1px solid #ccc;
     padding: 20px;
    }
 
    .ticket-header {
     margin-bottom: 20px;
    }
 
    .order-title {
     font-size: 24px;
     font-weight: bold;
     margin: 0;
     text-align: center;
    }
 
    .order-date {
     font-weight: bold;
     margin: 0;
    }
 
    table {
     width: 100%;
     border-collapse: collapse;
    }
 
    th, td {
     padding: 10px;
     text-align: left;
     border-bottom: 1px solid #ccc;
    }
 
    th {
     background-color: #f2f2f2;
    }
 
    .text-right {
     text-align: right;
    }
 </style>
 
 
     <h3>Order Confirmation</h3>
   
     @if(count($orders) > 0)
         <div class="order-ticket">
             <div class="ticket-header">
                 <p class="order-date">Order Date: {{ date('Y-m-d') }}</p>
             </div>
 
             <div class="ticket-body">
                 <table class="table">
                     <thead>
                         <tr>
                             <th>Product Name</th>
                             <th>Price</th>
                             <th>Quantity</th>
                             <th>Total Amount</th>
                         </tr>
                     </thead>
                     <tbody>
                         @php
                             $orderCollection = collect($orders);
                             $totalAmount = $orderCollection->sum('total_amount');
                         @endphp
                         
                         @foreach($orders as $order)
                         <tr>
                             <td>{{ $order['product_name'] }}</td>
                             <td>{{ $order['product_price'] }}DH</td>
                             <td>{{ $order['quantity'] }}</td>
                             <td>{{ $order['total_amount'] }}DH</td>
                         </tr>
                     @endforeach
                         <tr>
                             <td colspan="3" class="text-right">Total:</td>
                             <td>{{ $totalAmount }}DH</td>
                         </tr>
                     </tbody>
                 </table>
             </div>
 
             <div class="ticket-footer">
                 <p class="payment-amount">You must pay: {{ $totalAmount }}DH</p>
 
                 <form id="emailForm" method="POST" action="">
                     @csrf
                     <input type="hidden" name="totalAmount" value="{{ $totalAmount }}">
                   
                 </form>
             </div>
         </div>
 
     @else
         <p>No orders available.</p>
     @endif
 </div>