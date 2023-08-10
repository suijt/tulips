<?php

namespace App\Contracts;

use Illuminate\Http\Request;

interface CountryInterface
{
    /**
     * @return array
     */
    public function getAllCountries();

    /**
     * @param Request $request
     * @return array
     */
    public function storeCountry(Request $request);

}
