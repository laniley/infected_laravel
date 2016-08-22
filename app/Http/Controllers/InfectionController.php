<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Http\Response;
use App\Infection;
use App\User;

class InfectionController extends Controller
{
    public function index(Request $request)
    {
        $name = $request->input('name');

        $infections = new Infection();

        if(isset($name)) {
          $infections = $infections->where('name', '=', strtolower($name));
        }

        $infections = $infections->get();

        return '{ "infections": '.$infections.' }';
    }

    public function store(Request $request)
    {
        $user = User::findOrFail($request->input('infection.user_id'));

        // only create the new infection, when the user has an empty infection slot
        $max_infection_amount = $user->max_infections;
        $current_infection_amount = $user->getCurrentInfectionAmount();

        if($current_infection_amount < $max_infection_amount) {

          $wordlist="nigga|nigger|niggers|sandnigger|sandniggers|sandniggas|sandnigga|honky|honkies|chink|chinks|gook|gooks|wetback|wetbacks|spick|spik|spicks|spiks|bitch|bitches|bitchy|bitching|cunt|cunts|twat|twats|fag|fags|faggot|faggots|faggit|faggits|ass|asses|asshole|assholes|shit|shits|shitty|shity|dick|dicks|pussy|pussies|pussys|fuck|fucks|fucker|fucka|fuckers|fuckas|fucking|fuckin|fucked|motherfucker|motherfuckers|motherfucking|motherfuckin|mothafucker|mothafucka|motherfucka";
          if( preg_match('~\b('.$wordlist.')\b~i', strtolower($request->input('infection.name'))) ) {

            return response(
                    "Infection could not be created. No curse-words allowed. Please choose a different name.",
                    400);
          }
          else {

            if( !preg_match('/[^A-Za-z0-9_\-. ]/', $request->input('infection.name')) ) {
              $infection = Infection::firstOrCreate(array(
                'user_id' => $request->input('infection.user_id'),
                'name' => strtolower($request->input('infection.name'))
              ));
              return '{"infection":'.$infection.'}';
            }
            else {
              return response(
                        "Infection could not be created. The name includes forbidden characters.",
                        400);
            }
          }
        }
        else {
          return response(
                    "Infection could not be created. You don't have an empty infection slot.",
                    400);
        }
    }

    public function show($id) {
  		$infection = Infection::findOrFail($id);
      return '{ "infection": '.$infection.' }';
  	}
}
