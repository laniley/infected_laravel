<?php

namespace App\Http\Middleware;

use Closure;
use Log;
use Auth;
use Facebook;
use App\User;

class FBAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
		if ($_SERVER['REQUEST_METHOD'] !== 'OPTIONS') {

			$auth_token_in_request = str_replace("Bearer ", "", $request->header()["authorization"][0]);

			try {
	        	$response = Facebook::get('/me', $auth_token_in_request);
				// Convert the response to a `Facebook/GraphNodes/GraphUser` collection
       			$facebook_user = $response->getGraphUser();
				$user = User::where('fb_id', $facebook_user["id"])->firstOrFail();
				// Log the user into Laravel
       			Auth::login($user);

				return $next($request);

			}	catch (Facebook\Exceptions\FacebookResponseException $e) {
				$graphError = $e->getPrevious();
				Log::info('Graph API Error: ' . $e->getMessage());
				Log::info('Graph error code: ' . $graphError->getCode());
				exit;
			} catch (Facebook\Exceptions\FacebookSDKException $e) {
				dd($e->getMessage());
				Log::info($e);
				exit;
			}
		}
		else {
			return $next($request);
		}
    }
}
