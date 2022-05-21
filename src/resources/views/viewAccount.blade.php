<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="{{ mix('js/practice.js') }}"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">

    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    アカウント
                </div>
                <div>
                    @extends('layout.test')
                </div>
                <!-- モーダル開始 -->
                <div class="container">
                    <div class="row mb-5">
                        <div class="col-2">
                            <button type="button" class="btn btn-primary mb-12" data-toggle="modal" data-target="#storeModal">新規追加</button>
                        </div>
                    </div>
                    @extends('viewparts.storeModal')
                    </div>
                </div>
                <!-- モーダル終了 -->
                <div>                
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>グループ</th>
                                <th>氏名</th>
                                <td>編集</td>
                                <td>削除</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($viewAccounts as $viewAccount)
                            <tr>
                                <td>{{ $viewAccount->id }}</td>
                                <td>{{ $viewAccount->group }}</td>
                                <td>{{ $viewAccount->name }}</td>
                                <td>
                                <div class="container">
                                    <div class="row mb-5">
                                        <div class="col-2">
                                            <button type="button" class="btn btn-primary mb-12" data-toggle="modal" data-target="#editModal" data-watashi={{ $viewAccount }}>編集</button>
                                        </div>
                                    </div>
                                    @extends('viewparts.editModal')
                                </div>
                                </td>
                                <td>
                                    {{Form::open(['url' => '/deleteAccount', 'method' => 'post'])}}
                                        {{Form::hidden('id', $viewAccount->id)}}
                                        <button type="button" class= "btn btn-danger mb-12 deleteButton">削除</button>

                                        <!-- {{Form::submit('削除', ['class'=> 'btn btn-danger mb-12'])}} -->
                                    {{Form::close()}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <script src="{{ mix('js/app.js') }}"></script>
        <script>
        $(function(){
            $('.deleteButton').click(function() {
                confirm('本当に削除してよろしいですか？');
            });
        });


</script>
    </body>
</html>

