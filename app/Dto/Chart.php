<?php

namespace App\Dto;

class Chart
{
    public static function transformIntoDataChart($sumDepenses){
        $labels = [];
        foreach ($sumDepenses as $sumDepense) {
            $labels[] = $sumDepense["customerName"];
            $data[] = $sumDepense["sum"];
        }
        $value = new Chart();
        $value->labels = $labels;
        $value->data = $data;
        return $value;
    }
}
