<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use Mail;
use App\Mail\DemoMail;
  
class MailController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        $mailData = [
            'title' => 'Mail from Randa Shop',
            'body' => 'order confirmation'
        ];
         
        Mail::to('randadisous@gmail.com')->send(new DemoMail($mailData));
           
        return redirect()->route('commandes')->with('success', 'email send successfully');
    }
}