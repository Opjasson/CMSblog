<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
   public function index(){
        return view('auth.login.login', [
            'routeAction' => route('auth.login.action'),
            'routeHome' => route('site.home'),
            'routeForgotPassword' => 'todo-forgot-password'
        ]);
    }

    // Function untuk melakukan validasi form
    public function action(Request $request){
       $validated = $request->validate([
            'email' => [
                'required',
                'string',
                'email'
            ],
            'password' => [
                'required',
                'string'
            ],
            
        ]);
        dd($validated);

    }
}
