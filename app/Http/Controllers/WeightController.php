<?php
namespace App\Http\Controllers;

use App\Overrides\TimedApexChart;
use App\Weight;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WeightController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $datas = Weight::where('user_id', '=', Auth::user()->id)->orderBy('created_at', 'DESC')->get();

        $series = [];

        foreach ($datas as $data)
        {
            array_push($series, ['new Date(\'' . date_format($data->created_at, "Y-m-d") . '\').getTime()', $data->weight]);
        }

        $chart = (new TimedApexChart)
            ->setType('area')
            ->setHeight(500)
            ->setColors(['#7366ff'])
            ->showToolbar(true)
            ->allowZoom(true)
            ->setDataset([
                [
                    'name' => "'Weight'",
                    'data' => $series
                ]
            ]);

        return view('weight', compact('chart'));
    }

    public function add(Request $request)
    {
        $this->validate($request, [
            'weight' => 'required|integer'
        ]);

        $weight = new Weight;
        $weight->user_id = Auth::user()->id;
        $weight->weight = $request->weight;
        $weight->created_at = date('m.d.y');
        $weight->save();

        return back()->with('message', 'You successfully added your today weight');
    }

}
