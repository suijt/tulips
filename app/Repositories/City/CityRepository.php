<?php

namespace App\Repositories\City;

use App\Contracts\CityInterface;
use App\Models\Modules\City\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CityRepository implements CityInterface
{

    protected $city;

    public function __construct(City $city)
    {
        $this->city = $city;
    }

    function getAllCitiesByCountry(Request $request)
    {

        try {
            return $this->city->where('country_id', $request->country_id)->get(['name', 'id']);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }
    }

    function storeCity(Request $request)
    {
        try {
            return $this->city->create($request->all()) ? true : false;
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }
    }
}
