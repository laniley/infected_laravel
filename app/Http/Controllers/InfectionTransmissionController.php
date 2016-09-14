<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;
use DB;

use App\Http\Requests;
use App\InfectionTransmission;
use App\InfectionWave;
use App\User;

class InfectionTransmissionController extends Controller
{
	public function store(Request $request)
    {
		$recipient = User::firstOrCreate(array(
			'fb_id' => $request->input('infectionTransmission.recipient_fb_id')
		));

		$wave = InfectionWave::findOrFail(array(
			'infection_wave_id' => $request->input('infectionTransmission.infection_wave_id')
		))->first();

		$contagiousnessProgresses =
		DB::table('infections')
			-> crossJoin('infection_skills')
			-> leftJoin('infection_skill_progresses', 'infection_skills.id', '=', 'infection_skill_progresses.infection_skill_id')
			-> where([
				'infections.id' => $wave->infection->id,
			 	'infection_skills.id' => '4'
		  	])
			-> select(
				DB::raw('concat(infections.id, \'_\', infection_skills.id) as id'),
				'infections.id as infection_id',
				'infection_skills.id as infection_skill_id',
				DB::raw('ifnull(infection_skill_progresses.progress, 0) as progress')
			)
			->first();

		$likelihood = (($contagiousnessProgresses->progress + 1) * 100) / 16;
		$random = mt_rand(0,100);

		if($random <=  $likelihood) {
			$status = 1; // infected
		}
		else {
			$status = 2; // not infected
		}

        $infectionTransmission = InfectionTransmission::firstOrCreate(array(
			'infection_wave_id' => $wave->id,
			'infection_id' => $wave->infection->id,
			'user_id' => $recipient->id
		));

		$infectionTransmission->status = $status;

        $infectionTransmission->save();

		return '{"infectionTransmission":'.$infectionTransmission.'}';
    }
}
