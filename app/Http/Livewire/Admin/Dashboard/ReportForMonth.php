<?php

namespace App\Http\Livewire\Admin\Dashboard;

use App\Models\Viewer;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ReportForMonth extends Component
{
    public  $datachart;
    public  $month;
    public  $year;
    public  $count, $countLast;
    public  $years = [2023, 2024, 2025, 2026, 2027, 2028];
    public  $months = [
        ['num' => 1, 'name' => 'Enero'],
        ['num' => 2, 'name' => 'Febrero'],
        ['num' => 3, 'name' => 'Marzo'],
        ['num' => 4, 'name' => 'Abril'],
        ['num' => 5, 'name' => 'Mayo'],
        ['num' => 6, 'name' => 'Junio'],
        ['num' => 7, 'name' => 'Julio'],
        ['num' => 8, 'name' => 'Agosto'],
        ['num' => 9, 'name' => 'Septiembre'],
        ['num' => 10, 'name' => 'Octubre'],
        ['num' => 11, 'name' => 'Noviembre'],
        ['num' => 12, 'name' => 'Diciembre'],
    ];

    public function mount()
    {
        $this->month = ltrim(date('m'), 0);
        $this->year = date('Y');
    }


    public function getReportChartTwoProperty()
    {
        $data = [
            'labels' => [],
            'datasets' => []
        ];
      
        $datashet = [
            'borderWidth' => 2,
            'borderColor' => "#8A81FA",
            'backgroundColor' => "#8A81FA",
            'pointBorderColor' => "transparent",
            'label' => 'Visitantes Mes Actual',
            'data' => []
        ];
        $datashet2 = [
            'borderWidth' => 2,
            'borderColor' => "#c2c2c2",
            'backgroundColor' => "#c2c2c2",
            'pointBorderColor' => "transparent",
            'label' => 'Visitantes Mes Pasado',
            'data' => []
        ];

        $data['labels'] = $this->getDaysForMonth();
        $datashet['data'] = $this->getArrayCountDays();



        $datashet2['data'] = $this->getArrayCountDays(true);

        array_push($data['datasets'], $datashet);
        array_push($data['datasets'], $datashet2);

        $this->count = array_sum($this->getArrayCountDays());
        $this->countLast = array_sum($this->getArrayCountDays(true));

        return $data;
    }

    public function getArrayCountDays($last = false)
    {
        if ($last) {
            $month = $this->month - 1;
        } else {
            $month = $this->month;
        }


        $reports =    Viewer::select(
            DB::raw('count(id) as count'),
            DB::raw("EXTRACT(DAY FROM created_at) as day"),
        )
            ->groupBy('day')
            ->whereMonth('created_at', '=', $month)
            ->whereYear('created_at', '=', $this->year)
            ->get()
            ->toArray();

        $counts = array_fill(0,  31, 0);
        foreach ($reports as $day) {
            $i = $day['day'] - 1;
            $counts[$i] = floatval($day['count']);
        }

        return $counts;
    }

    public function getDaysForMonth($last = false)
    {

        $days = [];

        for ($i = 1; $i <= (int)31; $i++) {
            array_push($days, $i);
        }
        return $days;
    }

    public function render()
    {
        $this->reportChartTwo;
        return view('livewire.admin.dashboard.report-for-month');
    }
}
