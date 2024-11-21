<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Tags;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;


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
                'search' => route('dashboard.tag'),
                'create' => route('dashboard.tag.create')
            ],
            'queryString' => [
                'q' => $q
            ]
        ]);
    }

    public function create(){
        return view('dashboard.tag.create',[
            'form' => [
                'action' => route('dashboard.tag.store'),
                'back' => route('dashboard.tag')
            ]
        ]);
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'title' => [
                    'required',
                    'string',
                    'min:3',
                    'max:60'
                ]
        ]);

        // validasi slug
        $validator->after(function ($validator) use ($request) {
            if($validator->errors()->isEmpty()) {
                $slugValidator = Validator::make($request->all(), [
                    'slug' => [
                            'required',
                            'string',
                            'unique:tags,slug'
                        ]
                ],attributes:[
                    'slug' => 'title'
                ]);

                if($slugValidator->fails()){
                    foreach($slugValidator->errors()->all() as $error){
                        $validator->errors()->add('title', $error);
                    }
                }

            }
        });

        if($validator->fails()){
            throw ValidationException::withMessages($validator->errors()->messages());
        }
        
        Tags::create($validator->getData());
        return redirect(route('dashboard.tag'));
    }

    public function edit($slugId)
    {
        // Jika Idnya ada maka didapatkan data tagnya kalau tidak ada maka akan triger error handlernya
        $tag = Tags::findOrFail($slugId);

        return view('dashboard.tag.edit',[
            'tag' => $tag,
            'form' => [
                'action' => route('dashboard.tag.update', [
                    'slugId' => $tag->id
                ]),
            ],
            'route' => [
                'back' => route('dashboard.tag')
            ]
            
        ]);
    }

    public function update(Request $request, $slugId){
        $validator = Validator::make($request->all(), [
            'title' => [
                    'required',
                    'string',
                    'min:3',
                    'max:60'
                ]
        ]);

        // validasi slug
        $validator->after(function ($validator) use ($request, $slugId) {
            if($validator->errors()->isEmpty()) {
                $slugValidator = Validator::make($request->all(), [
                    'slug' => [
                            'required',
                            'string',
                            'unique:tags,slug,' . $slugId
                        ]
                ],attributes:[
                    'slug' => 'title'
                ]);

                if($slugValidator->fails()){
                    foreach($slugValidator->errors()->all() as $error){
                        $validator->errors()->add('title', $error);
                    }
                }

            }
        });

        if($validator->fails()){
            throw ValidationException::withMessages($validator->errors()->messages());
        }

        $tag = Tags::findOrfail($slugId);
        $tag->update($validator->getData());

        return redirect(route('dashboard.tag'));
        
    }

    public function delete($slugId)
    {
        $tag = Tags::findOrfail($slugId);
        $tag->delete();

        // berbeda dengan ini akan mengembalikan kehalaman dashboard awal
        // return redirect(route('dashboard.tag'));

        // akan kembali kehalaman saat menghapus tags
        return redirect()->back();
    }
}
