<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;
use DB;

use App\Http\Requests;
use App\Quest;

class UserQuestController extends Controller
{
    public function index(Request $request)
    {
        $user_id = $request->input('user_id');

        $quests = new Quest();

		if(isset($user_id))
		{
			$quests = $quests
            -> leftJoin('users_quests', function ($join) {
				$join -> on('users_quests.quest_id', '=', 'quests.parent_id');
			})
			-> where('user_id', '=', $user_id)
			-> select(
				DB::raw("concat('".$user_id."_' , quests.id) as id"),
				DB::raw("'".$user_id."' as user_id"), 'quests.id as quest_id',
				DB::raw("case when quests.parent_id is null or users_quests.id is not null then 1 else 0 end as is_unlocked"),
				DB::raw("case when users_quests.id is null then 0 else 1 end as is_completed")
			);
		}

		$quests = $quests->get();

		return '{ "userQuests": '.$quests.' }';
    }

    public function store(Request $request)
    {
        // $user = User::firstOrCreate(array(
        //   'fb_id' => $request->input('user.fb_id')
        // ));
        //
        // $user->first_name = $request->input('user.first_name');
        // $user->last_name = $request->input('user.last_name');
        // $user->gender = $request->input('user.gender');
        // $user->save();
        //
        // return '{"user":'.$user.'}';
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
}
