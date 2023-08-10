<?php

namespace App\Contracts;

use Illuminate\Http\Request;

interface CityInterface
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function getAllCitiesByCountry(Request $request);

    /**
     * @param Request $request
     * @return mixed
     */
    public function storeCity(Request $request);

}
