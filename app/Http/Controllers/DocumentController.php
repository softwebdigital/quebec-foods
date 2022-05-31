<?php

namespace App\Http\Controllers;

use Image;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DocumentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDocumentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'method' => ['required'],
            'photo' => ['required', 'file', 'image'],
            'number' => ['required']
        ]);
        if ($validator->fails()){
            return back()->withInput()->withErrors($validator)->with('error', 'Invalid input data');
        }
        $data = $request->only(['method', 'number']);
        $destinationPath = 'assets/photos'; // upload path
        HomeController::createDirectoryIfNotExists($destinationPath);
        $transferImage = \auth()->user()['id'].'-id-'. time() . '.' . $request['photo']->getClientOriginalExtension();
        $image = Image::make($request->file('photo'));
        $image->save($destinationPath . '/' . $transferImage, 40);
        $data['photo'] = $destinationPath ."/".$transferImage;
        auth()->user()->documents()->create($data);
        return back()->with('success', 'ID submitted successfully');
    }
}