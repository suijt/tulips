<?php

namespace App\Http\Controllers;

use App\Contracts\CountryInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
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

    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $countries = $this->countries->getAllCountries();

        return view('welcome', compact('countries'));

    }
}
