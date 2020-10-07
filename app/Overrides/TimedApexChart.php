<?php
namespace App\Overrides;

use Illuminate\Support\Facades\View;

class TimedApexChart extends ApexChart
{

    public function __construct()
    {
        parent::__construct();
    }

    public function script()
    {
        return View::make('larapex-charts::chart.script-with-datetime', ['chart' => $this]);
    }

}
