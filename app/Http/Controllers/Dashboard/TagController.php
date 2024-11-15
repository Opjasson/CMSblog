<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Tags;
use Illuminate\Http\Request;

class TagController extends Controller
{
    //
    public function index() {
        
        return view('dashboard.tag.index', [
            'tags' => Tags::take(10)->get()
        ]);
    }
}
