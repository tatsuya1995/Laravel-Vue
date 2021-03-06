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
                    <p class="">??????</p>
                    <!-- <input type="text" class="" name="name"></input> -->
                    {{Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'placeholder' => '??????'])}}
                </div>
                <div>
                    <p class="">??????</p>
                    <label class="">
                        <span>??????</span>
                        {{Form::radio('gender', '??????', true, ['class' => 'form-control','id'=>'radioGender1'])}}
                    </label>
                    <label class="">
                        <span>??????</span>
                        {{Form::radio('gender', '??????', true, ['class' => 'form-control','id'=>'radioGender2'])}}
                    </label>
                    <label class="">
                        <span>?????????</span>
                        {{Form::radio('gender', '?????????', true, ['class' => 'form-control','id'=>'radioGender3'])}}
                    </label>
                </div>
                <div>
                    <p class="">??????</p>
                    {{Form::number('age', null, ['class' => 'form-control', 'id' => 'age'])}}
                </div>
                <div>
                <!-- // ??? ????????????????????????????????? -->
                    <p class="">???</p>
                    <span class="star" id="1">???</span>
                    <span class="star" id="2">???</span>
                    <span class="star" id="3">???</span>
                    <span class="star" id="4">???</span>
                    <span class="star" id="5">???</span>
                    <input type="hidden" name="star" value="attribute">
                </div>
                <div>
                    <p class="">??????</p>
                    {{Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'placeholder' => '??????'])}}
                </div>
                <div>
                <p>??????</p>
                <!-- <textarea class="rows:20 cols:40" name="note"></textarea> -->
                {{Form::textarea('note', null, ['row' => '5', 'class' => 'form-control', 'id' => 'note'])}}
                </div>
                // ????????????????????????
                <input type="submit" value="??????">
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
                    stars[j].style.color = "#f0da61"; //??????
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
                    stars[j].style.color = "#a09a9a"; //?????????
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

                    stars[j].style.color = "#f0da61"; //??????
                }
                for (let j = i + 1; j < stars.length; j++) {
                    stars[j].style.color = "#a09a9a"; //?????????
                }
            },
            false
            );
        }
        });
        function starCountSave(attribute) {
            const url = `/save/${attribute}`;
            // *************************
            // // XMLHttpRequest????????????????????????
            // let xhr = new XMLHttpRequest();
            // xhr.open('post', url);
            // // ?????????????????????
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

