
    <!-- ボタンクリック後に表示される画面の内容 -->
    <div class="modal fade" id="storeModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                {{Form::open(['url' => '/storeAccount'])}}
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">新規ユーザー追加</h4>
                    </div>
                    <div class="modal-body">
                        {{Form::label('group','地域')}}
                        {{Form::text('group', null, ['class' => 'form-control', 'id' => 'group', 'placeholder' => '九州'])}}
                        {{Form::label('name','氏名')}}
                        {{Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'placeholder' => '令和 太郎'])}}
                    </div>
                    <div class="modal-footer">
                        {{Form::submit('保存', ['class'=> 'btn btn-primary'])}}
                        <!-- <button type="button" class="btn btn-primary">保存</button> -->
                        <button type="button" class="btn btn-default" data-dismiss="modal">キャンセル</button>
                    </div>
                {{Form::close()}}
            </div>
        </div>
    </div>
