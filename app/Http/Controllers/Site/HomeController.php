<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    // Routing ke halaman home
    public function index(){    
        return view("site.home.index");
    }
}
