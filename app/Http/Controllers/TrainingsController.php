<?php
namespace App\Http\Controllers;

use App\Training;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrainingsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $today = date('Y-m-d');

        $trainingsDb = Training::where([['date', '>=', date('Y-m-d')], ['user_id', '=', Auth::user()->id]])->orderBy('date')->get();
        $trainings = array();

        foreach ($trainingsDb as $training)
        {
            $dateKey = date('Y-m-d', $training->date->getTimestamp());
            if (!(array_key_exists($dateKey, $trainings)))
            {
                $trainings[$dateKey] = [];
            }

            array_push($trainings[$dateKey], $training);
        }

        return view('trainings', compact('today', 'trainings'));
    }

    public function addNormal(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'date' => 'required|date',
        ]);

        $training = new Training;
        $training->user_id = Auth::user()->id;
        $training->name = $request->name;
        $training->date = date('d-m-Y', strtotime($request->date));
        $training->done = false;
        $training->save();

        return back()->with('message', 'You successfully added a training');
    }

    public function addRecurrent(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        if ($request->recurrence == 0)
        {
            return back()->withErrors(['recurrence' => 'You can\'t select no recurrence']);
        }

        $recurrenceValues = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday', 'everyday'];
        $recurrence = $recurrenceValues[$request->recurrence - 1];

        $userId = Auth::user()->id;

        $date = date('d-m-Y', strtotime($request->start_date));
        $currentDate = $date;

        if ($recurrence != 'everyday')
        {
            $currentDate = $this->getFirstDay($date, $recurrence);
        }

        while (strtotime($currentDate) <= strtotime($request->end_date))
        {
            $training = new Training;
            $training->user_id = $userId;
            $training->name = $request->name;
            $training->date = $currentDate;
            $training->done = false;
            $training->save();

            if ($recurrence != 'everyday')
            {
                $currentDate = date('d-m-Y', strtotime('+7 day', strtotime($currentDate)));
            }
            else
            {
                $currentDate = date('d-m-Y', strtotime('+1 day', strtotime($currentDate)));
            }
        }

        return back()->with('message', 'You successfully added a training');
    }

    public function trainingDone(Request $request)
    {
        $training = Training::where('id', '=', $request->id)->first();

        if ($training != null && Auth::user()->id == $training->user_id)
        {
            $training->done = true;
            $training->save();
        }

        return redirect('trainings');
    }

    public function trainingNotDone(Request $request)
    {
        $training = Training::where('id', '=', $request->id)->first();

        if ($training != null && Auth::user()->id == $training->user_id)
        {
            $training->done = false;
            $training->save();
        }

        return redirect('trainings');
    }

    public function deleteTraining(Request $request)
    {
        $training = Training::where('id', '=', $request->id)->first();

        if ($training != null && Auth::user()->id == $training->user_id)
        {
            $training->delete();
        }

        return redirect('trainings');
    }

    public static function dateToStr($date)
    {
        if ($date == date('Y-m-d'))
        {
            return "Today";
        }

        return date('l j F Y', strtotime($date));
    }

    private function getFirstDay($date, $day)
    {
        $time = strtotime($date);

        while (strtolower(date('l', $time)) != $day)
        {
            $time = strtotime('+1 day', $time);
        }

        return date('d-m-Y', $time);
    }

}
