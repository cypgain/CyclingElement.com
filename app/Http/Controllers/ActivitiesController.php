<?php
namespace App\Http\Controllers;

use App\Activity;
use Illuminate\Support\Facades\Auth;

class ActivitiesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        $activities = Activity::where('user_id', '=', $user->id)->get();

        return view('activities', compact('activities'));
    }

}
