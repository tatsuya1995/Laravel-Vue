<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css">


        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }
        </style>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div id="app">
                <!--  検索画面 -->
                @extends('viewparts.spot_search')
                <!-- リスト -->

                <div class="">
                        @if(!empty($spotList))
                            @foreach($spotList as $spot_info)
                            <div class="card">
                                <!-- スポット名と住所にする -->
                                <div class="card-header">{{$spot_info->name}} {{$spot_info->name}}</div>
                                <div class="card-body">
                                <!-- 備考 -->
                                    <p>{{$spot_info->note}}</p>
                                    <p>{{$spot_info->name}}({{$spot_info->age}}) 最終更新日:{{$spot_info->updated_at}}</p>
                                </div>
                            </div>
                            @endforeach
                            @else
                                登録データがありません。    
                            @endif
                        </div>
                    </div>
                </div>

        <!-- <script src="{{ mix('js/app.js') }}"></script> -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>

