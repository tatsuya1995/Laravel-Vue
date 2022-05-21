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

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div id="app">
                <form action="/save" method="post">
                @csrf
                <div>
                    <p class="">名前</p>
                    <!-- <input type="text" class="" name="name"></input> -->
                    {{Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'placeholder' => '太郎'])}}
                </div>
                <div>
                    <p class="">性別</p>
                    <label class="">
                        <span>男性</span>
                        {{Form::radio('gender', '男性', true, ['class' => 'form-control','id'=>'radioGender1'])}}
                    </label>
                    <label class="">
                        <span>女性</span>
                        {{Form::radio('gender', '女性', true, ['class' => 'form-control','id'=>'radioGender2'])}}
                    </label>
                    <label class="">
                        <span>その他</span>
                        {{Form::radio('gender', 'その他', true, ['class' => 'form-control','id'=>'radioGender3'])}}
                    </label>
                </div>
                <div>
                    <p class="">年齢</p>
                    {{Form::number('age', null, ['class' => 'form-control', 'id' => 'age'])}}
                </div>
                <div>
                <!-- // 星 満足度、綺麗さ、便利さ -->
                    <p class="">星</p>
                    <span class="star" id="1">★</span>
                    <span class="star" id="2">★</span>
                    <span class="star" id="3">★</span>
                    <span class="star" id="4">★</span>
                    <span class="star" id="5">★</span>
                    <input type="hidden" name="star" value="attribute">
                </div>
                <div>
                    <p class="">住所</p>
                    {{Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'placeholder' => '太郎'])}}
                </div>
                <div>
                <p>備考</p>
                <!-- <textarea class="rows:20 cols:40" name="note"></textarea> -->
                {{Form::textarea('note', null, ['row' => '5', 'class' => 'form-control', 'id' => 'note'])}}
                </div>
                // 写真アップロード
                <input type="submit" value="保存">
                </form>
            </div>
        </div>

        <script src="{{ mix('js/app.js') }}"></script>

    </body>

    <script>
        var stars = document.getElementsByClassName("star");
        var clicked = false;
        document.addEventListener("DOMContentLoaded", () => {
        for (let i = 0; i < stars.length; i++) {

            stars[i].addEventListener(
            "mouseover",
            () => {
                if (!clicked) {
                for (let j = 0; j <= i; j++) {
                    stars[j].style.color = "#f0da61"; //黄色
                }
                }
            },
            false
            );

            stars[i].addEventListener(
            "mouseout",
            () => {
                if (!clicked) {
                for (let j = 0; j < stars.length; j++) {
                    stars[j].style.color = "#a09a9a"; //グレー
                }
                }
            },
            false
            );

            stars[i].addEventListener(
            "click",
            () => {
                clicked = true;
                let attribute = stars[i].getAttribute("id");
                    console.log(attribute);
                    starCountSave(attribute);
                for (let j = 0; j <= i; j++) {

                    stars[j].style.color = "#f0da61"; //黄色
                }
                for (let j = i + 1; j < stars.length; j++) {
                    stars[j].style.color = "#a09a9a"; //グレー
                }
            },
            false
            );
        }
        });
        function starCountSave(attribute) {
            const url = `/save/${attribute}`;
            // *************************
            // // XMLHttpRequestオブジェクト生成
            // let xhr = new XMLHttpRequest();
            // xhr.open('post', url);
            // // リクエスト送信
            // xhr.send(attribute);
            // xhr.onload = function() {
            //     if (xhr.status != 200) {
            //         alert(`Error ${xhr.status}: ${xhr.statusText}`);
            //     }
            // }
            // *************************
            fetch(url, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(attribute)
            }).then(response => {
                console.log(response.status);

            })
        }


    </script>
</html>

