<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;
use DB;

use App\Http\Requests;
use App\User;
use App\RocketComponent;
use App\RocketComponentModel;
use App\RocketComponentModelMm;

class RocketComponentController extends Controller
{
    public function index(Request $request) {

		$rocket_id	 = $request->input('rocket');
		$type		 = $request->input('type');

        if(isset($rocket_id) && isset($type)) {
			$rocketComponents = RocketComponent::where(array(
	  	        'rocket_id' => $rocket_id,
	  	        'rocketComponentType_id' => $type
	  	    ))->get();
		}

	    foreach ($rocketComponents as $rocketComponent) {
			$rocketComponent = $this->prepareRocketComponent($rocketComponent);
		}

	    return '{ "rocketComponents": '.$rocketComponents.' }';
    }

    public function store(Request $request) {

		$rocketComponent = RocketComponent::firstOrCreate(array(
			'rocket_id' => $request->input('rocketComponent.rocket_id'),
       		'rocketComponentType_id' => $request->input('rocketComponent.rocketComponentType_id')
		));

		$rocketComponentModel = RocketComponentModel::where(array(
    		'model' => 1,
    		'rocketComponentType_id' => $request->input('rocketComponent.rocketComponentType_id')
    	))->firstOrFail();

    	$rocketComponentModelMm = RocketComponentModelMm::firstOrCreate(array(
    		'rocketComponent_id' => $rocketComponent->id,
    		'rocketComponentModel_id' => $rocketComponentModel->id
    	));


		$rocketComponent->selectedRocketComponentModelMm_id = $rocketComponentModelMm->id;

    	$rocketComponent->save();

    	$rocketComponent = $this->prepareRocketComponent($rocketComponent);

	  	return '{"rocketComponent":'.$rocketComponent.' }';
    }

    public function show($id)
    {
		$rocketComponent = RocketComponent::findOrFail($id);
    	$rocketComponent = $this->prepareRocketComponent($rocketComponent);

		$rocketComponentModelMms = $rocketComponent->myRocketComponentModelMms;

		return '{"rocketComponent":'.$rocketComponent.', "rocketComponentModelMms": '.$rocketComponentModelMms.'}';
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
