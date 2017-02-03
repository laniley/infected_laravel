<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;
use DB;

use App\Http\Requests;
use App\RocketComponentModelMm;

class RocketComponentModelMmController extends Controller
{
    public function index(Request $request)
    {
		if($request->has('rocketComponent') || $request->has('rocketComponentModel')) {
		  	if($request->has('rocketComponent') && $request->has('rocketComponentModel')) {
				$rocketComponentModelMms = RocketComponentModelMm::where(array(
					'rocketComponent_id' => $request->input('rocketComponent'),
					'rocketComponentModel_id' => $request->input('rocketComponentModel')
				))->get();
		  	}
			else if($request->has('rocketComponent')) {
				$rocketComponentModelMms = RocketComponentModelMm::where(array(
			        'rocketComponent_id' => $request->input('rocketComponent')
			    ))->get();
			}
		}
	  	else {
			$rocketComponentModelMms = RocketComponentModelMm::all();
    	}

    	return '{ "rocketComponentModelMms": '.$rocketComponentModelMms.'}';
    }

    public function store(Request $request)
    {
		$rocketComponentModelMm = RocketComponentModelMm::firstOrCreate(array(
			'rocketComponent_id' => $request->input('rocketComponentModelMm.rocketComponent_id'),
       		'rocketComponentModel_id' => $request->input('rocketComponentModelMm.rocketComponentModel_id')
		));
		$rocketComponentModelMm->status = $request->input('rocketComponentModelMm.status');
		$rocketComponentModelMm->save();
	  	return '{"rocketComponentModelMm":'.$rocketComponentModelMm.' }';
    }

    public function show($id)
    {
		// $rocketComponent = RocketComponent::findOrFail($id);
    	// $rocketComponent = $this->prepareRocketComponent($rocketComponent);
		//
		// $rocketComponentModelMms = $rocketComponent->myRocketComponentModelMms;
		//
		// return '{"rocketComponent":'.$rocketComponent.', "rocketComponentModelMms": '.$rocketComponentModelMms.'}';
    }

    public function update(Request $request, $id)
    {
        // $user = User::findOrFail($id);
        // $user->first_name = $request->input('user.first_name');
        // $user->last_name = $request->input('user.last_name');
        // $user->gender = $request->input('user.gender');
        // $user->locale = $request->input('user.locale');
        // $user->last_login_at = $user->updated_at;
        // $user->save();
        //
        // return '{"user":'.$user.'}';
    }

	public function updateTutorialStep(Request $request, $id)
    {
        // $user = User::findOrFail($id);
        // $user->tutorial_step_id = $request->input('tutorial_step_id');
        // $user->save();
        //
        // return '{"user":'.$user.'}';
    }


    public function destroy($id)
    {
        //
    }

	private function prepareRocketComponent($rocketComponent)
	{
		$modelMms = $rocketComponent->myRocketComponentModelMms;
		$modelMmIds = [];

		foreach($modelMms as $modelMm) {
			array_push($modelMmIds, $modelMm->id);
		}

		$rocketComponent["rocketComponentModelMms"] = $modelMmIds;

		return $rocketComponent;
	}
}
