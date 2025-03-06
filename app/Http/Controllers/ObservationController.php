<?php

namespace App\Http\Controllers;

use App\Models\Observation;
use Illuminate\Http\Request;

class ObservationController extends Controller
{

public function show($id)
{
    // Get the observation by its ID
    $observation = Observation::findOrFail($id);

    // Pass the observation data to the view
    return view('observation.show', ['observation'=>$observation]);
}

}
