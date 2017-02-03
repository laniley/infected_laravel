<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;
use DB;

use App\Http\Requests;
use App\User;
use App\Achievement;
use App\UserAchievementMm;
use App\Message;
use App\FBAppRequest;
use App\Energy;

class UserController extends Controller
{
    public function index(Request $request)
    {
		$fb_id = $request->input('fb_id');
		$mode  = $request->input('mode');
		$type  = $request->input('type');

		$users = new User();

		$users = $users -> leftJoin('users_achievements_mm', function($join) {
				$join -> on('users_achievements_mm.user_id', '=', 'users.id');
				$join -> on('users_achievements_mm.unlocked', '=', DB::raw(1));
			})
			->leftJoin('achievements', function($join) {
				$join -> on('users_achievements_mm.achievement_id', '=', 'achievements.id');
			})
			-> select(DB::raw('users.*, SUM(achievement_points) AS achievement_points, SUM(users_achievements_mm.updated_at) AS max_updated'))
			-> groupBy('users.id');

        if(isset($fb_id)) {
			$users = $users->where('fb_id', $fb_id);
		}
		else if(isset($mode) && $mode == "leaderboard") {
			if(isset($type) && $type == "score") {
				$users = $users -> orderByRankDesc()
									      -> take(50);
			}
			else if(isset($type) && $type == "achievements") {
				$users = $users -> orderByAchievementsDesc()
												-> where('unlocked', true)
												-> take(50);
			}
			else if(isset($type) && $type == "challenges") {
				$users = $users -> orderByChallengesRankDesc()
									      -> take(50);
			}
	  	}

        $users = $users->get();

		// if get player -> get also achievements, fb-app-requests and energy
		if(isset($fb_id) && count($users) > 0) {
			if(isset($mode) && $mode == "me") {
				$achievements = Achievement::all();

				foreach ($users as $user) {
					// Achievements
					$user->rank_by_achievement_points = $user->rankByAchievementPoints();
					$achievement_ids = [];
					foreach ($achievements as $achievement) {
						$achievements_mm = UserAchievementMm::firstOrCreate(array(
						 'user_id' => $user['id'],
						 'achievement_id' => $achievement['id']
						));
						$achievement['id'] = $achievements_mm['id'];
						$achievement['user_id'] = $user['id'];
						array_push($achievement_ids, $achievements_mm['id']);
					}
					$user->achievements = $achievement_ids;
					// messages
					$messages = Message::where('to_user_id', $user->id)->get();
					$message_ids = [];
					foreach($messages as $message) {
						array_push($message_ids, $message['id']);
					}
					$user->messages_received = $message_ids;
					// fb-app-requests
					$fb_app_requests = FBAppRequest::where('fb_id', $user->fb_id)->get();
					$request_ids = [];
					foreach($fb_app_requests as $request) {
						array_push($request_ids, $request['id']);
						$request["to_user_id"] = $user->id;
					}
					$user->fb_app_requests_received = $request_ids;
					// Energy
					$energy = Energy::firstOrCreate(array(
						 'user_id' => $user->id
					));
					$user['energy_id'] = $energy->id;
				}

				return '{ "users": '.$users.', "achievements": '.$achievements.', "fbAppRequests": '.$fb_app_requests.', "messages": '.$messages.' }';
			}
			else {
				return '{ "users": '.$users.'}';
			}
		}
		else {
			return '{ "users": '.$users.'}';
		}
		// foreach ($users as $user) {
		// 	$user = $this->prepareUser($user);
		// 	// if(isset($fb_id)) {
		// 	// 	$user->rank_by_won_challenges = $user->rankByWonChallenges();
		// 	// }
		// }
    }

    public function store(Request $request)
    {
        $user = User::firstOrCreate(array(
          'fb_id' => $request->input('user.fb_id')
        ));

        $user->first_name = $request->input('user.first_name');
        $user->last_name = $request->input('user.last_name');
        $user->gender = $request->input('user.gender');
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

	public function updateTutorialStep(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->tutorial_step_id = $request->input('tutorial_step_id');
        $user->save();

        return '{"user":'.$user.'}';
    }


    public function destroy($id)
    {
        //
    }
}
