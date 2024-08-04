<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        if (auth()->user()->role == 'admin') {
            return redirect()->route('admin.dashboard');
        }
        return view('dashboard');
    }
}
