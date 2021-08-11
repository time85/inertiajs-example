<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RegisterController extends Controller
{
    public function showRegisterForm()
    {
        return Inertia::render('Auth/Register');
    }

    public function register(Request $request)
    {

    }
}
