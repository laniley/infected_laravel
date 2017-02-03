<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;
use DB;

use App\Http\Requests;
use App\User;
use App\Lab;

class LabController extends Controller
{
    public function index(Request $request)
    {
		$user_id = $request->input('user');
		$labs = [];

        if(isset($user_id)) {
            $lab = Lab::firstOrCreate(array(
				'user_id' => $user_id
			));
			array_push($labs, $lab);
		}
		else {
			$labs = Lab::all();
		}

		return '{ "labs": ['.implode($labs, ',').'] }';
    }

    public function store(Request $request)
    {
		// $rocket = Rocket::firstOrCreate(array(
		// 	'user_id' => $request->input('rocket.user_id')
		// ));
    	// $rocket = $this->getRocketComponents($rocket);
		//  	return '{"rocket":'.$rocket.' }';
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

    public function destroy($id)
    {
        //
    }

}
