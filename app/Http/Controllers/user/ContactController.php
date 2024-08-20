<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use Exception;
use DateTime;

use function Laravel\Prompts\alert;

class ContactController extends Controller
{
  public function index()
  {
    return view('user/contact');
  }
  public function submit(Request $request)
  {
    try
    {
    $report=[
      'name' => $request->post('name'),
      'email' => $request->post('email'),
      'phone' => $request->post('phone'),
      'question' => $request->post('question'),
    ];
    ContactUs::create($report);
    return redirect('/contact')->with('success', 'Contact form submitted successfully!');
  }
  catch(Exception $ex)
  {
    
    alert('Failed');
  }
    return redirect('/contact')->with('error', 'An error occurred. Please try again later.');
  }
}
