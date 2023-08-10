<?php

namespace App\Repositories\Population;

use App\Contracts\PopulationInterface;
use App\Models\Modules\Population\Population;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PopulationRepository implements PopulationInterface
{
    protected $population;

    public function __construct(Population $population)
    {
        $this->population = $population;
    }

    function getPopulation(Request $request)
    {
        return $this->population->where('city_id', $request->city_id)->get();
    }

    function storePopulation(Request $request)
    {
        try {
            return $this->population->create($request->all()) ? true : false;
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }
    }
}
