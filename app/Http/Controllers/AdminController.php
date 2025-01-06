<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        if (Auth::user()->role == 'Admin') {
            return view('admin1.index');
        } else {
            return redirect('/')->with('fail', 'you are an authenticated user');
        }
    }
}
