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

        return view('trainings', compact('today'));
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
