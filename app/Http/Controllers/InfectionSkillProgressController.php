<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Http\Requests;

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
}
