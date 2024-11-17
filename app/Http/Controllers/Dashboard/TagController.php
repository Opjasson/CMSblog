<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Tags;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TagController extends Controller
{
    //
    public function index(Request $request) {
        // Untuk menghapus spasi rata kiri dan kanan
        $q = Str::trim($request->query('q'));
        $tags = [];
        if($q){
            // method appends digunakan untuk menambahkan parameter query str ke URL
            // atau bisa menggunakan method withQueryString()
            $tags = Tags::where('title', 'LIKE', "%".$q."%")->paginate(10)->appends('q', $q);
        }else{
            $tags = Tags::paginate(10);
        }
    
        return view('dashboard.tag.index', [
            'tags' => $tags,
            'route' => [
                'search' => route('dashboard.tag')
            ],
            'queryString' => [
                'q' => $q
            ]
        ]);
    }
}
