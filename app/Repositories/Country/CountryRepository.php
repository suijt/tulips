<?php

namespace App\Repositories\Country;

use App\Contracts\CountryInterface;
use App\Models\Modules\Country\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CountryRepository implements CountryInterface
{
    protected $country;

    public function __construct(Country $country)
    {
        $this->country = $country;
    }

    function getAllCountries()
    {
        return $this->country->get();
    }

    function storeCountry(Request $request)
    {
        try {
            return $this->country->create($request->all()) ? true : false;
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }
    }
}
