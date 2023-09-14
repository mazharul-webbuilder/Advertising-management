<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AdminController extends Controller
{

    public function allCountries()
    {
        return view('countries');
    }

    public function getCountry(Request $request)
    {
        $country = Country::where('code', $request->code)->first();
        return \response()->json([
           'status' => Response::HTTP_OK,
           'country' => $country
        ]);
    }

    public function changeCountryActiveStatus(Request $request)
    {
        $coutnry = Country::where('code', $request->code)->first();

        $coutnry->status != 1 ? $coutnry->status = 1 : $coutnry->status = 0;

        $coutnry->save();

        return  response()->json([
            'status' => Response::HTTP_OK
        ]);
    }

    public function setPerDayAddLimitInACountry(Request $request)
    {
        dd($request->all());
    }
}
