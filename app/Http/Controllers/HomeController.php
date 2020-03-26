<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use App;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function lang($locale)
    {
        App::setLocale($locale);
        session()->put('locale', $locale);
        return redirect()->back();
    }

    public function getAvatar($filename)
    {

        $path = storage_path('app/public/photos/') . $filename;
    
        if (!File::exists($path)) 
            $path = storage_path('app/public/photos/') . 'j31eEfLAt01.png';

        $file = File::get($path);
        $type = File::mimeType($path);

        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);

        return $response;
    }

    public function getAPhoto($filename)
    {

        $path = storage_path('app/public/photos/') . $filename;
    
        if (!File::exists($path)) 
            $path = storage_path('app/public/photos/') . 'j31eEfLAt01.png';

        $file = File::get($path);
        $type = File::mimeType($path);

        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);

        return $response;
    }
}
