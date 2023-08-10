<?php

namespace App\Http\Controllers\Population;

use App\Contracts\PopulationInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Population\PopulationRequest;
use Illuminate\Http\Request;

class PopulationController extends Controller
{
    protected $population;

    public function __construct(PopulationInterface $population)
    {
        $this->population = $population;
    }

    /**
     * Handle the incoming request.
     */
    public function index(Request $request)
    {
        return response()->json($this->population->getPopulation($request));
    }

    public function store(PopulationRequest $request)
    {
        $population = $this->population->storePopulation($request);
        if ($population) {
            $success = 'success';
            $message = "Population successfully created!";
        } else {
            $success = 'error';
            $message = "Population creation Failed!";
        }

        return redirect()->back()->with($success, $message);
    }
}
