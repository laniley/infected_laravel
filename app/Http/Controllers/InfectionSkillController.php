<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\InfectionSkill;

class InfectionSkillController extends Controller
{
  public function index(Request $request)
  {
      $infectionSkills = InfectionSkill::all();

      return '{ "infectionSkills": '.$infectionSkills.' }';
  }
}
