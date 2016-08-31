<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Http\Requests;
use App\InfectionSkillProgress;

class InfectionSkillProgressController extends Controller
{
  public function index(Request $request)
  {
      $infectionSkillProgresses =
        DB::table('infections')
          -> crossJoin('infection_skills')
          -> leftJoin('infection_skill_progresses', 'infection_skills.id', '=', 'infection_skill_progresses.infection_skill_id')
          -> where('infections.id', '=', $request->input('infection_id'))
          -> select(
              DB::raw('concat(infections.id, \'_\', infection_skills.id) as id'),
              'infections.id as infection_id',
              'infection_skills.id as infection_skill_id',
              DB::raw('ifnull(infection_skill_progresses.progress, 0) as progress')
            )
          ->get();

      return '{ "infectionSkillProgresses": '.json_encode($infectionSkillProgresses).' }';
  }

  public function store(Request $request)
  {
      $infectionSkillProgress = InfectionSkillProgress::firstOrCreate(array(
        'infection_id' => $request->input('infectionSkillProgress.infection_id'),
        'infection_skill_id' => $request->input('infectionSkillProgress.infection_skill_id')
      ));

      $infectionSkillProgress->progress = $request->input('infectionSkillProgress.progress');
      $infectionSkillProgress->save();

      return '{ "infectionSkillProgress": '.$infectionSkillProgress.' }';
  }

  public function update(Request $request)
  {
      $infectionSkillProgress = InfectionSkillProgress::firstOrCreate(array(
        'infection_id' => $request->input('infectionSkillProgress.infection_id'),
        'infection_skill_id' => $request->input('infectionSkillProgress.infection_skill_id')
      ));

      $infectionSkillProgress->progress = $request->input('infectionSkillProgress.progress');
      $infectionSkillProgress->save();

      return '{ "infectionSkillProgress": '.$infectionSkillProgress.' }';
  }
}
