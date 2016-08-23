<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\InfectionSkillType;

class InfectionSkillTypeController extends Controller
{
  public function index(Request $request)
  {
      $infectionSkillTypes = InfectionSkillType::all();

      return '{ "infectionSkillTypes": '.$infectionSkillTypes.' }';
  }
}
