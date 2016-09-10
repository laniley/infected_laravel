<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\InfectionTransmission;

class InfectionTransmissionController extends Controller
{
	public function store(Request $request)
    {
        $infectionTransmission = InfectionTransmission::firstOrCreate(array(
							'infection_wave_id' => $request->input('infectionTransmission.infection_wave_id'),
							'fb_id' => $request->input('infectionTransmission.fb_id')
						 ));

        $infectionTransmission->save();

		return '{"infectionTransmission":'.$infectionTransmission.'}';
    }
}
