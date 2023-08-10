<?php

namespace App\Http\Controllers\Dashboard;

use App\Contracts\CountryInterface;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
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
    public function index($formType = 'country')
    {
        $countries = '';
        if ($formType != 'country') {
            $countries = $this->countries->getAllCountries();
        }
        return view('dashboard.index', compact('countries', 'formType'));
    }
}
