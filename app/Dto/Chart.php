<?php

namespace App\Dto;

class Chart
{
    public static function transformIntoDataChart($sumDepenses){
        $labels = [];
        $data = [];
        $customerId = [];
        foreach ($sumDepenses as $sumDepense) {
            $labels[] = $sumDepense["customerName"];
            $data[] = $sumDepense["sum"];
            $customerId[] = $sumDepense["customerId"];
        }
        $value = new Chart();
        $value->labels = $labels;
        $value->data = $data;
        $value->customerId = $customerId;
        return $value;
    }

    public static function transformIntoDataChartSum($sumDepenses){
        $labels = [];
        $data = [];
        foreach ($sumDepenses as $sumDepense) {
            $labels[] = $sumDepense["budgetName"];
            $data[] = $sumDepense["sum"];
        }
        $value = new Chart();
        $value->labels = $labels;
        $value->data = $data;
        return $value;
    }
}
