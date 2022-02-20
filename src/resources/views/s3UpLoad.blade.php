<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>S3アップロード</title>

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
                <div class="title m-b-md">
                    S3アップロード
                    <canvas id="stage" width="600" height="400"></canvas>

                </div>
                <div id="app">
                    <form enctype="multipart/form-data" action="{{ action('s3UpLoadController@create') }}" method="POST">
                        @csrf
                        <input name="file" type="file" id="file">
                        <input type="submit" id="submit" onclick="fileCheck()">
                    </form>
                </div>
                <div class="title m-b-md">
                    S3表示
                </div>
                <div>
                    <img src="{{ $path ?? '' }}">
                </div>
            </div>
        </div>
        <script src="{{ mix('js/app.js') }}"></script>
        <script>
            var obj = document.getElementById("file");
            obj.addEventListener("change", function(event) {
                var files = event.target.files;
                var input_submit = document.getElementById("submit");

                for (let i = 0 ; i < files.length; i++) {
                    if (files[i].size >= 200000) {
                        // 不活性の有効化
                        input_submit.disabled = true;
                        var str = "";
                        str += "ファイルサイズは " + 200 + " kB以下にしてください";
                        var error_msg = document.createElement('p');
                        error_msg.className = 'error-msg';
                        error_msg.textContent = str;
                        obj.before(error_msg);
                    } else {
                        input_submit.disabled = false;
                        document.getElementByClassName.error_msg.remove();
                    }
                }


            })

            function fileCheck() {
                // submitが押されたときに
                // filesizeが200kB以上だったら
                // アラート出してsubmitしない
                console.log();
                console.log('hello');
            }

        </script>
    </body>
</html>
