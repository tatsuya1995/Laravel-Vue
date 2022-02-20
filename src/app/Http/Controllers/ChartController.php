<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function index() 
    {
        // chartのデータをとってくる。一旦仮でおく
        $dayLabels = [
            'days' => ['8月1日', '8月2日', '8月3日', '8月4日', '8月5日', '8月6日', '8月7日'],
            'alldata' => [
                [
                    'name' => '最高気温(度）',
                    'data' => [35, 34, 37, 35, 34, 35, 34, 25],
                    'borderColor' => 'rgba(255,0,0,1)',
                    'backgroundColor'=> 'rgba(0,0,0,0)'
                ],
                [
                    'name' => '最低気温(度）',
                    'data' => [25, 27, 27, 25, 26, 27, 25, 21],
                    'borderColor' => 'rgba(0,0,255,1)',
                    'backgroundColor'=> 'rgba(0,0,0,0)'
                ]
            ],
        ];

        var_dump($dayLabels);

        $dayLabels = json_encode($dayLabels);  


        return view('chart', ['dayLabels' => $dayLabels]);
    }
}
