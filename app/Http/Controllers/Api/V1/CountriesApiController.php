<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App;

class CountriesApiController extends Controller
{


    public function getRegions($id)
    {
        $locale = App::getLocale();
        $states = DB::table("regions")
                    ->where("country",$id)
                    ->pluck("region_".$locale, "region", "country");
        return response()->json($states);
    }

    public function getCities($id)
    {
        $locale = App::getLocale();
        $cities= DB::table("cities")
                    ->where("region",$id)
                    ->pluck("city_".$locale, "id");
        return response()->json($cities);
    }
}
