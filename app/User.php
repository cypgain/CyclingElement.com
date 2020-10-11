<?php

namespace App;

use Carbon\Carbon;
use Strava;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Permissions\HasPermissionsTrait;

class User extends Authenticatable
{
    use Notifiable;
    use HasPermissionsTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'avatar', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function avatarPath()
    {
        return is_null($this->avatar) ? 'assets/images/default_avatar.jpg' : 'storage/' . $this->avatar;
    }

    public function getStravaToken()
    {
        $strava = StravaToken::where('user_id', '=', $this->id)->first();

        if (is_null($strava)) return null;

        if (time() > strtotime($strava->expires_at))
        {
            $token = Strava::refreshToken($strava->refresh_token);
            $strava->access_token = $token->access_token;
            $strava->refresh_token = $token->refresh_token;
            $strava->expires_at = date('Y-m-d H:i:s', $token->expires_at);
            $strava->save();
        }

        return $strava->access_token;
    }

    public function getStravaId()
    {
        $strava = StravaToken::where('user_id', '=', $this->id)->first();

        return is_null($strava) ? null : $strava->strava_id;
    }

    public function setStravaToken($stravaId, $accessToken, $refreshToken, $expiresAt)
    {
        $strava = StravaToken::where('user_id', '=', $this->id)->first();

        if (is_null($strava))
        {
            $strava = new StravaToken;
        }

        $strava->user_id = $this->id;
        $strava->strava_id = $stravaId;
        $strava->access_token = $accessToken;
        $strava->refresh_token = $refreshToken;
        $strava->expires_at = date('Y-m-d H:i:s', $expiresAt);
        $strava->save();
    }

}
