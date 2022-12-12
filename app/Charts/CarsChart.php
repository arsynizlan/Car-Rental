<?php

namespace App\Charts;

use App\Models\Car;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class CarsChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build()
    {
        return $this->chart->pieChart()
            ->setTitle('Kepemilikan Mobil')
            ->setSubtitle('Tahun ' . date("Y"))
            ->addData([
                Car::where('owner', '=', 'Milik Perusahaan')->count(),
                Car::where('owner', '=', 'Sewaan')->count(),
            ])
            ->setLabels(['Milik Perusahaan', 'Sewaan']);
    }
}