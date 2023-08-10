<?php

namespace App\Contracts;

use Illuminate\Http\Request;

interface PopulationInterface
{

    /**
     * @param Request $request
     * @return array
     */
    public function getPopulation(Request $request);

    /**
     * @param Request $request
     * @return array
     */
    public function storePopulation(Request $request);

}
