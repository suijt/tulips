<?php

namespace App\Http\Controllers\Country;

use App\Contracts\CountryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Country\CountryRequest;

class CountryController extends Controller
{

    /**
     * @var CountryInterface
     */
    protected $countries;

    /**
     * @param CountryInterface $countries
     */
    public function __construct(CountryInterface $countries)
    {
        $this->countries = $countries;
    }

    public function index()
    {
        return view('dashboard.index');
    }

    public function store(CountryRequest $request)
    {
        $country = $this->countries->storeCountry($request);
        if ($country) {
            $success = 'success';
            $message = "Country successfully created!";
        } else {
            $success = 'error';
            $message = "Country creation Failed!";
        }

        return redirect()->back()->with($success, $message);
    }
}
