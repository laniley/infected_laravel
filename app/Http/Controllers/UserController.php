<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Infection;

class UserController extends Controller
{
    public function index(Request $request)
    {
      	$fb_id = $request->input('fb_id');
        $mode = $request->input('mode');

        $users = new User();

        if(isset($fb_id)) {
			$users = $users->where('fb_id', $fb_id);
		}

        $users = $users->get();

        if(isset($mode) && $mode == "me" && count($users) > 0) {
          $user = $users[0];
          $infections = Infection::where('user_id', $user->id)->get();
        }
        else {
          $infections = '[]';
        }

        return '{ "users": '.$users.', "infections": '.$infections.'}';
    }

    public function store(Request $request)
    {
        $user = User::firstOrCreate(array(
          'fb_id' => $request->input('user.fb_id')
        ));

        $user->first_name = $request->input('user.first_name');
        $user->last_name = $request->input('user.last_name');
        $user->gender = $request->input('user.gender');
        $user->locale = $request->input('user.locale');
        $user->save();

        return '{"user":'.$user.'}';
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return '{"user":'.$user.'}';
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->first_name = $request->input('user.first_name');
        $user->last_name = $request->input('user.last_name');
        $user->gender = $request->input('user.gender');
        $user->locale = $request->input('user.locale');
        $user->last_login_at = $user->updated_at;
        $user->save();

        return '{"user":'.$user.'}';
    }

    public function destroy($id)
    {
        //
    }
}
