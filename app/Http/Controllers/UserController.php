<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\User;
use App\Photo;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::select('*')->orderByDesc('last_online_at')->paginate(6);

        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('user.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'min:3|max:25',
            'biography' => 'min:3|max:200'
        ]);

        $user = auth()->user();

        $user->fill([
            'name' => $request->input('name'),
            'biography' => $request->input('biography'),
        ])->save();
        
        return redirect()
            ->route('user.edit')
            ->with('success', 'Изменения успешно сохранены!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editAvatar()
    {
        return view('user.edit_avatar');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateAvatar(Request $request)
    {
        $data = $request->image;


        list($type, $data) = explode(';', $data);
        list(, $data)      = explode(',', $data);

        $photoHash = Str::random(11);

        $data = base64_decode($data);
        $image_name= $photoHash;
        $ext = 'png';
        $path = storage_path('app/public/photos/') . $image_name.'.'.$ext;

        $photo = new Photo;
        $photo->name = $image_name;
        $photo->alt = $image_name;
        $photo->extension = 'png';
        $photo->type = 1;
        $photo->user()->associate($request->user());
        $photo->save();

        //
        $user = auth()->user();
        $user->avatar = $image_name.'.'.$ext;
        $user->save();

        file_put_contents($path, $data);



        return response()->json(['success'=>'done']);
        //return redirect('profile/'.auth()->user()->username)->with('success', 'Аватар успешно изменен!');
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
