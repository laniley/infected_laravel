<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;
use DB;

use App\Http\Requests;
use App\RocketComponentModel;

class RocketComponentModelController extends Controller
{
    public function index(Request $request)
    {
		if($request->has('model') || $request->has('type')) {

			if($request->has('model') && $request->has('type')) {
				$rocketComponentModels = RocketComponentModel::where(array(
					'model' => $request->input('model'),
					'rocketComponentType_id' => $request->input('type')
				))->get();
			}
			else if($request->has('type')) {
				$rocketComponentModels = RocketComponentModel::where(array(
	        		'rocketComponentType_id' => $request->input('type')
	      		))->get();
			}
	  	}
	  	else {
			$rocketComponentModels = RocketComponentModel::all();
    	}

		return '{"rocketComponentModels":'.$rocketComponentModels.'}';
    }

    public function store(Request $request)
    {
		// $rocketComponent = RocketComponent::firstOrCreate(array(
		// 	'rocket_id' => $request->input('rocketComponent.rocket_id'),
     //   		'type' => $request->input('rocketComponent.type')
		// ));
		//
    	// $rocketComponent->costs = $request->input('rocketComponent.costs');
    	// $rocketComponent->construction_time = $request->input('rocketComponent.construction_time');
    	// $rocketComponent->construction_start = $request->input('rocketComponent.construction_start');
    	// $rocketComponent->status = $request->input('rocketComponent.status');
		//
		// if($request->has('rocketComponent.selectedRocketComponentModelMm_id')) {
		// 	$selectedRocketComponentModelMm = RocketComponentModelMm::find($request->input('rocketComponent.selectedRocketComponentModelMm_id'));
		//
		// 	if($selectedRocketComponentModelMm) {
		// 		$rocketComponent->selectedRocketComponentModelMm_id = $selectedRocketComponentModelMm->id;
		// 	}
		// }
		//
    	// $rocketComponent->save();
		//
    	// $rocketComponent = $this->prepareRocketComponent($rocketComponent);
		//
		//  	return '{"rocketComponent":'.$rocketComponent.' }';
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
}
