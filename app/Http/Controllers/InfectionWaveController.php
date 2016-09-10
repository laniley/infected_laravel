<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;

use App\Http\Requests;
use App\Infection;
use App\InfectionWave;

class InfectionWaveController extends Controller
{
	public function store(Request $request)
    {
        $infectionWave = new InfectionWave();

		$infectionWave->infection_id = $request->input('infectionWave.infection_id');

		$infection = Infection::findOrFail($request->input('infectionWave.infection_id'))
						->withCount('infectionSkillProgresses')
						->first();

		$external_survival_skill_level = 1;

		if($infection->infection_skill_progresses_count > 0) {
			$infectionSkillProgresses = $infection->infectionSkillProgresses();
			foreach($infectionSkillProgresses as $progress) {
				Log::info($progress);
				if($progress->infection_skill_id == 3) {
					$external_survival_skill_level = $progress->progress + 1;
				}
			}
		}

		$infectionWave->ends_at = date('Y-m-d H:i:s', strtotime("+$external_survival_skill_level day"));
        $infectionWave->save();

		return '{"infectionWave":'.$infectionWave.'}';
    }
}
