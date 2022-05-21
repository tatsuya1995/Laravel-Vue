
        <div class="flex-center position-ref full-height">
            <div class="content">
                <h2>検索</h2>
            <!--  検索画面 -->
                <form action="/search" method="get">
                    @csrf
                
                {{Form::select('sortOrder', $sortList, ['class' => 'form-control', 'id' => 'order'])}}
                <p>名前</p> 
                {{Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'placeholder' => '太郎'])}}

                <p>年齢幅</p>
                {{Form::select('ageRange', $ageRangeList, ['class' => 'form-control', 'id' => 'ageRange'])}}

                <!-- <p>星</p>
                {{Form::number('star', null, ['class' => 'form-control', 'id' => 'star'])}} -->
                
                <input type="submit">
                </form>
        </div>
        </div>