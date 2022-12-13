<?php

namespace App\Charts;

use Carbon\Carbon;
use App\Models\Booking;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class CarsUsageChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\LineChart
    {
        $dataDate = array();
        for ($i = 11; $i >= 0; $i--) {
            $month = Carbon::today()->startOfMonth()->subMonth($i);
            array_push($dataDate, $month->shortMonthName);
        }

        $data = array();
        for ($i = 1; $i <= 12; $i++) {
            $date = Booking::whereYear('date_from', '=', date("Y"))
                ->whereMonth('date_from', '=', $i)
                ->count();

            array_push($data, $date);
        }
        return $this->chart->lineChart()
            ->addData('Mobil', [$data])
            ->setXAxis($dataDate);
    }
}