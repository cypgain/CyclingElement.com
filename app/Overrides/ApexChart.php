<?php
namespace App\Overrides;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class ApexChart extends LarapexChart
{

    protected $toolbar;
    protected $zoom;

    public function __construct()
    {
        parent::__construct();

        $this->toolbar = json_encode(['show' => false]);
        $this->zoom = json_encode(['enabled' => false]);
    }

    public function showToolbar($val)
    {
        $this->toolbar = json_encode(['show' => $val]);
        return $this;
    }

    public function allowZoom($val)
    {
        $this->zoom = json_encode(['enabled' => $val]);
        return $this;
    }

    public function toolbar()
    {
        return $this->toolbar;
    }

    public function zoom()
    {
        return $this->zoom;
    }

}
