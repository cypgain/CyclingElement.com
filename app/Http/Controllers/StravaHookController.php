<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Strava;
use App\Activity;
use App\StravaToken;
use App\User;

class StravaHookController extends Controller
{

    public function get(Request $request)
    {
        return response(json_encode(['hub.challenge' => $request->hub_challenge]), 200);
    }

    public function post(Request $request)
    {
        logger($request);

        if ($request->object_type == 'activity')
        {
            $stravaRequest = StravaToken::where('strava_id', '=', $request->owner_id)->first();

            if (!(is_null($stravaRequest)))
            {
                $user = User::where('id', '=', $stravaRequest->user_id)->first();

                if ($request->aspect_type == 'create')
                {
                    logger('create ' . $request->object_id);

                    $stravaActivity = Strava::activity($user->getStravaToken(), $request->object_id);

                    logger('activity id ' . $stravaActivity->id);
                    logger('athlete id ' . $stravaActivity->athlete->id);

                    if (!(is_null($stravaActivity)))
                    {
                        $activity = new Activity;
                        $activity->id = $stravaActivity->id;
                        $activity->strava_id = $stravaActivity->athlete->id;
                        $activity->user_id = $user->id;
                        $activity->name = $stravaActivity->name;
                        $activity->type = $stravaActivity->type;
                        $activity->distance = $stravaActivity->distance;
                        $activity->moving_time = $stravaActivity->moving_time;
                        $activity->elapsed_time = $stravaActivity->elapsed_time;
                        $activity->elevation = $stravaActivity->total_elevation_gain;
                        $activity->start_date = $stravaActivity->start_date;
                        $activity->average_speed = $stravaActivity->average_speed;
                        $activity->max_speed = $stravaActivity->max_speed;

                        if (isset($stravaActivity->average_watts))
                            $activity->average_watts = $stravaActivity->average_watts;

                        if (isset($stravaActivity->max_watts))
                            $activity->max_watts = $stravaActivity->max_watts;

                        $activity->calories = $stravaActivity->calories;

                        if (isset($stravaActivity->average_cadence))
                            $activity->average_cadence = $stravaActivity->average_cadence;

                        if (isset($stravaActivity->average_heartrate))
                            $activity->average_heartrate = $stravaActivity->average_heartrate;

                        if (isset($stravaActivity->max_heartrate))
                            $activity->max_heartrate = $stravaActivity->max_heartrate;

                        $activity->save();
                    }
                }
                else if ($request->aspect_type == 'delete')
                {
                    logger('delete ' . $request->object_id);

                    $activity = Activity::where([['id', '=', $stravaRequest->object_id], ['user_id', '=', $user->id]])->first();

                    if (!(is_null($activity)))
                    {
                        $activity->delete();
                    }
                }
            }
        }

        return response('200');
    }

}
