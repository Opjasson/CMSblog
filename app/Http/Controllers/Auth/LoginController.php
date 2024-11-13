<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

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
    public function action(LoginRequest $request){
        $request->authentikasi();
        $request->session()->regenerate();

        return redirect()->intended(route('dashboard.home', absolute: false));

    }
}
