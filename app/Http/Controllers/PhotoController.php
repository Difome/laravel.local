<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\User;
use App\Photo;
use Image;

class PhotoController extends Controller
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
    public function upload()
    {
        return view('photo.upload');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('photo'))
        {

            $this->validate($request, [
                'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $photoHash = Str::random(11);
            $image = $request->file('photo');
            $input['imagename'] = $photoHash.'.'.$image->getClientOriginalExtension();
            $filename = $photoHash;
            $destinationPath = storage_path('app/public/photos');
            $extension = $image->getClientOriginalExtension();

            $img = Image::make($image->path());
            $img->save($destinationPath.'/'.$input['imagename']);

            $img->fit(200, 200, function ($constraint) {
                $constraint->upsize();
            })->save($destinationPath.'/200/'.$input['imagename']);

            $img->fit(120, 120, function ($constraint) {
                $constraint->upsize();
            })->save($destinationPath.'/120/_'.$input['imagename']);

            $img->fit(64, 64, function ($constraint) {
                $constraint->upsize();
            })->save($destinationPath.'/64/'.$input['imagename']);

            $destinationPath = storage_path('/app/public/photos');

            $image->move($destinationPath, $input['imagename']);

            $photo = new Photo;
            $photo->name = $filename;
            $photo->alt = $filename;
            $photo->extension = $extension;
            $photo->user()->associate($request->user());
            $photo->save();

            return redirect('/@'.auth()->user()->username)->with('success', 'Фото успешно загружено!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($username)
    {
        $user = User::where('username', $username)->firstOrFail();

        return view('photo.index', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
