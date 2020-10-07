<?php
namespace App\Http\Controllers;

use App\Overrides\TimedApexChart;
use App\HeartRate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HeartRateController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $datas = HeartRate::where('user_id', '=', Auth::user()->id)->orderBy('created_at', 'DESC')->get();

        $series = [];

        foreach ($datas as $data)
        {
            array_push($series, ['new Date(\'' . date_format($data->created_at, "Y-m-d") . '\').getTime()', $data->heart_rate]);
        }

        $chart = (new TimedApexChart)
            ->setType('area')
            ->setHeight(500)
            ->setColors(['#7366ff'])
            ->showToolbar(true)
            ->allowZoom(true)
            ->setDataset([
                [
                    'name' => "'Heart Rate'",
                    'data' => $series
                ]
            ]);

        return view('heartrate', compact('chart'));
    }

    public function add(Request $request)
    {
        $this->validate($request, [
            'heart_rate' => 'required|integer'
        ]);

        $ht = new HeartRate;
        $ht->user_id = Auth::user()->id;
        $ht->heart_rate = $request->heart_rate;
        $ht->created_at = date('m.d.y');
        $ht->save();

        return back()->with('message', 'You successfully added your today heartrate');
    }

}
