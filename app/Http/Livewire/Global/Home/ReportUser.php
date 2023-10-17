<?php

namespace App\Http\Livewire\Global\Home;

use App\Models\ProcessInvestment;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ReportUser extends Component
{
    public  $datachart;
    public  $month;
    public  $year;
    public  $countContrast, $countContrastLast;
    public  $amountContrast, $amountContrastLast;
    public  $years = [2022, 2023, 2024, 2025];
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
        $this->month = date('m');
        $this->year = date('Y');
    }

    public function getReportChartOneProperty()
    {
        $data = [
            'labels' => [],
            'datasets' => []
        ];
        $datashet = [
            'borderWidth' => 2,
            'borderColor' => "#F06635",
            'backgroundColor' => "transparent",
            'pointBorderColor' => "transparent",
            'label' => 'Mes Actual',
            'data' => []
        ];
        $datashet2 = [
            'borderWidth' => 2,
            'borderColor' => "#c2c2c2",
            'backgroundColor' => "transparent",
            'pointBorderColor' => "transparent",
            'label' => 'Mes pasado',
            'data' => []
        ];

        $data['labels'] = $this->getDaysForMonth();
        $datashet['data'] = $this->getArrayDays();

        $datashet2['data'] = $this->getArrayDays(true);

        array_push($data['datasets'], $datashet);
        array_push($data['datasets'], $datashet2);


        $this->countContrast = array_sum( $this->getArrayDays());
        $this->countContrastLast = array_sum( $this->getArrayDays(true));

        return $data;
    }
    public function getReportChartTwoProperty()
    {
        $data = [
            'labels' => [],
            'datasets' => []
        ];
        $datashet = [
            'borderWidth' => 2,
            'borderColor' => "#F06635",
            'backgroundColor' => "transparent",
            'pointBorderColor' => "transparent",
            'label' => 'Mes Actual',
            'data' => []
        ];
        $datashet2 = [
            'borderWidth' => 2,
            'borderColor' => "#c2c2c2",
            'backgroundColor' => "transparent",
            'pointBorderColor' => "transparent",
            'label' => 'Mes pasado',
            'data' => []
        ];

        $data['labels'] = $this->getDaysForMonth();
        $datashet['data'] = $this->getArraySumDays();



        $datashet2['data'] = $this->getArraySumDays(true);

        array_push($data['datasets'], $datashet);
        array_push($data['datasets'], $datashet2);

        $this->amountContrast = array_sum( $this->getArraySumDays());
        $this->amountContrastLast = array_sum( $this->getArraySumDays(true));

        return $data;
    }

    public function getArraySumDays($last = false)
    {
        if ($last) {
            $month = $this->month - 1;
        } else {
            $month = $this->month;
        }


        $reports =    ProcessInvestment::where('status_id', 3)
            ->where('active', false)
            ->user(auth()->user()->id)
            ->join("investments", "process_investments.investment_id", "=", "investments.id")
            ->select(
                DB::raw('sum(amount) as sum'),
                DB::raw("EXTRACT(DAY FROM investments.created_at) as day"),
            )
            ->groupBy('day')
            ->whereMonth('investments.created_at', '=', $month)
            ->whereYear('investments.created_at', '=', $this->year)
            ->get()
            ->toArray();

        $sums = array_fill(0,  31, 0);
        foreach ($reports as $day) {
            $i = $day['day'] - 1;
            $sums[$i] = floatval($day['sum']);
        }

        return $sums;
    }
    public function getArrayDays($last = false)
    {
        if ($last) {
            $month = $this->month - 1;
        } else {
            $month = $this->month;
        }

       
        $reports =    ProcessInvestment::where('status_id', 3)
            ->where('active', false)
            ->user(auth()->user()->id)
            ->join("investments", "process_investments.investment_id", "=", "investments.id")
            ->select(
                DB::raw('count(code) as count'),
                DB::raw("EXTRACT(DAY FROM investments.created_at) as day"),
            )
            ->groupBy('day')
            ->whereMonth('investments.created_at', '=', $month)
            ->whereYear('investments.created_at', '=', $this->year)
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
        $this->reportChartOne;
        $this->reportChartTwo;
        return view('livewire.global.home.report-user');
    }
}
