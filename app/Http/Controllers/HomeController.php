<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\Rules;


class HomeController extends Controller
{
    /**
     * Display the user's profile form.
     */
	 public function index(Request $request): View
    {
	
        return view('welcome');
    } 
	 
    
}
