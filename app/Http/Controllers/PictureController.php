<?php

namespace App\Http\Controllers;

use App\Models\Picture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Alixe;

class PictureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.createimmg');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $size = Picture::all();

        $path = $request->file('src');
        $filename = time() . '.' . $path->getClientOriginalExtension();
        $image_resize = Alixe::make($path->getRealPath());
        $image_resize->save(storage_path('app/public/' . $filename));
        $image_resize->resize(10, 20);
        $image_resize->save(storage_path('app/public/thumbnails/' . $filename));

        $post = new Picture();
        $post->src = $filename;
        if (sizeof($size) == 0) {
            $post->first = 1;
        } elseif (sizeof($size) >= 1) {
            $post->first = 0;
        }
        $post->save();
        return redirect('dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Picture  $picture
     * @return \Illuminate\Http\Response
     */
    public function show(Picture $picture)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Picture  $picture
     * @return \Illuminate\Http\Response
     */
    public function edit(Picture $picture)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Picture  $picture
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Picture $picture)
    {
        $pone = Picture::find(1);
        $ptwo = Picture::find(2);
        $pthree = Picture::find(3);
        if ($request->id == 1) {
            $pone->first = true;
            $ptwo->first = false;
            $pthree->first = false;
        } elseif ($request->id == 2) {
            $pone->first = false;
            $ptwo->first = true;
            $pthree->first = false;
        } else {
            $pone->first = false;
            $ptwo->first = false;
            $pthree->first = true;
        }
        $pone->save();
        $ptwo->save();
        $pthree->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Picture  $picture
     * @return \Illuminate\Http\Response
     */
    public function destroy(Picture $picture)
    {
        //
    }
}
