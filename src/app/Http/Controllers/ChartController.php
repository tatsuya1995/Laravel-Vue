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

        // 天気API取得
        $weatherConfig = array(
            'appid' => '',
            'lat' => '26.231408',
            'lon' => '127.685525',
        );
        // $weather_json = file_get_contents('http://api.openweathermap.org/data/2.5/forecast?lat=' . $weather_config['lat'] . '&lon=' . $weather_config['lon'] . '&units=metric&lang=ja&APPID=' . $weather_config['appid']);
        // 1時間ごとに出してくれるhourlyで

        $weatherJson = file_get_contents('http://api.openweathermap.org/data/2.5/onecall?lat=' . $weatherConfig['lat'] . '&lon=' . $weatherConfig['lon'] . '&units=metric&lang=ja&APPID=' . $weatherConfig['appid']);
        $weatherData = json_decode($weatherJson, true);
        $weatherHours = $weatherData['hourly']; // 1時間毎の天気の情報全て

        $hour = [];
        $temp = [];
        $dayLabels = [];
        $tempData = [];
        $weatherViewData = array();

        // 1時間毎の気温・天気・天気のアイコンを取得
        foreach($weatherHours as $weatherHour) {
            // 時間と気温のラベルを取得
            $dayLabels[] = date('m/d:H時', $weatherHour['dt']);
            $tempData[] = $weatherHour['temp'];

            $weather = $weatherHour['weather'][0]['description']; // 後で別で使いたい
            $icon = $weatherHour['weather'][0]['icon']; // 後で別で使いたい

            $weatherViewData['dayLabels'] = $dayLabels;
            $weatherViewData['temp'] = $tempData;
            $weatherViewData['icon'] = $icon;
//            <img src="http://openweathermap.org/img/w/04n.png">

        }
        // JSへ渡すためにエンコード
        $weatherViewData = json_encode($weatherViewData);

        //TODO 時間と気温と天気を送る
        return view('chart', ['weatherViewData' => $weatherViewData]);
    }
}
