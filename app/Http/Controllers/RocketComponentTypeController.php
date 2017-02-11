<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;
use DB;

use App\Http\Requests;
// use App\User;
// use App\Rocket;
use App\RocketComponentType;

class RocketComponentTypeController extends Controller {

    public function index(Request $request) {

		// $rocket_id	 = $request->input('rocket');
		// $type		 = $request->input('type');
		//
        // if(isset($rocket_id) && isset($type)) {
		// 	$rocketComponents = RocketComponent::where(array(
	  	 //        'rocket_id' => $rocket_id,
	  	 //        'rocketComponentType_id' => $type
	  	 //    ))->get();
		// }
		//
	    // foreach ($rocketComponents as $rocketComponent) {
		// 	$rocketComponent = $this->prepareRocketComponent($rocketComponent);
		// }
		//
	    // return '{ "rocketComponents": '.$rocketComponents.' }';
    }

    // public function store(Request $request) {}

    public function show($id) {
		$rocketComponentType = RocketComponentType::findOrFail($id);
		return '{"rocketComponentType":'.$rocketComponentType.'}';
    }

    // public function update(Request $request, $id) {}

    // public function destroy($id) {}
}
