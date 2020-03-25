<?php 

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Country;
class RegisterStep2Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showForm()
    {
        $countries = Country::all();
        return view('auth.register_step2', compact('countries'));
    }

    public function postForm(Request $request)
    {

        //auth()->user()->update($request->only(['biography', 'country_id', 'region_id', 'city_id']));
        $user = auth()->user();

        if ($request->get('biography') !== NULL)
        {
            $user->biography = $request->get('biography');
        }
        $user->country_id = $request->get('country_id');
        $user->region_id = $request->get('region_id');
        $user->city_id = $request->get('city_id');
        $user->update();

        return redirect()->route('user.show', $user->username);
    }
}