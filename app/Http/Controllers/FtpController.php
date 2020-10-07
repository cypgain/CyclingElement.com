<?php
namespace App\Http\Controllers;

use App\Ftp;
use App\Overrides\TimedApexChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FtpController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $datas = Ftp::where('user_id', '=', Auth::user()->id)->orderBy('created_at', 'DESC')->get();

        $series = [];

        foreach ($datas as $data)
        {
            array_push($series, ['new Date(\'' . date_format($data->created_at, "Y-m-d") . '\').getTime()', $data->ftp]);
        }

        $chart = (new TimedApexChart)
            ->setType('area')
            ->setHeight(500)
            ->setColors(['#7366ff'])
            ->showToolbar(true)
            ->allowZoom(true)
            ->setDataset([
                [
                    'name' => "'FTP'",
                    'data' => $series
                ]
            ]);

        return view('ftp', compact('chart'));
    }

    public function add(Request $request)
    {
        $this->validate($request, [
            'ftp' => 'required|integer'
        ]);

        $ftp = new Ftp;
        $ftp->user_id = Auth::user()->id;
        $ftp->ftp = $request->ftp;
        $ftp->created_at = date('m.d.y');
        $ftp->save();

        return back()->with('message', 'You successfully added your ftp');
    }

}
