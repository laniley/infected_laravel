<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;
use DB;

use App\Http\Requests;
use App\User;
use App\Rocket;
use App\RocketComponent;

class RocketController extends Controller
{
    public function index(Request $request)
    {
		$user_id = $request->input('user');

        if(isset($user_id)) {
            $user = User::find($user_id);
            $rocket = $user->rocket;
            $rocket = $this->getRocketComponents($rocket);
			return '{ "rockets": ['.$rocket.'] }';
		}
    }

    public function store(Request $request)
    {
		$rocket = Rocket::firstOrCreate(array(
			'user_id' => $request->input('rocket.user_id')
		));
    	$rocket = $this->getRocketComponents($rocket);
	  	return '{"rocket":'.$rocket.' }';
    }

    public function show($id)
    {
        // $user = User::findOrFail($id);
        // return '{"user":'.$user.'}';
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

	private function getRocketComponents($rocket) {
		if($rocket) {
			$cannon = RocketComponent::cannons()->where('rocket_id', $rocket->id)->first();
			$shield = RocketComponent::shields()->where('rocket_id', $rocket->id)->first();
			$engine = RocketComponent::engines()->where('rocket_id', $rocket->id)->first();

			if($cannon) {
				$rocket->cannon_id = $cannon->id;
			}

	    	if($shield) {
				$rocket->shield_id = $shield->id;
			}

	    	if($engine) {
				$rocket->engine_id = $engine->id;
			}
		}

		return $rocket;
	}
}
