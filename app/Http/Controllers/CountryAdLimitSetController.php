<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Requests\CountryAdLimitRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class CountryAdLimitSetController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(CountryAdLimitRequest $request)
    {
        try {
            $country = Country::where('code', $request->code)->first();

            DB::beginTransaction();
            $country->update(['per_day_ad_limit' => $request->per_day_ad_limit]);

            DB::commit();
            return \response()->json([
                'status' => Response::HTTP_OK,
                'message' => 'Set Ad Limit Successfully',
                'type' => 'success',
                'country' => $country
            ]);
                    } catch (QueryException $e) {
            DB::rollBack();
            return response()->json([
                'status' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message' => $e->getMessage(),
                'type' => 'error'
            ]);
        }
    }
}
