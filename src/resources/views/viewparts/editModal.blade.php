<!-- ボタンクリック後に表示される画面の内容 -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            {{Form::open(['url' => '/editAccount', 'method' => 'post'])}}
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">アカウント情報編集</h4>
                </div>
                <div class="modal-body">
                    {{Form::label('group','地域')}}
                    {{Form::text('group', $viewAccount->group, ['class' => 'form-control', 'id' => 'group', 'placeholder' => ''])}}
                    {{Form::label('name','氏名')}}
                    {{Form::text('name', $viewAccount->name, ['class' => 'form-control', 'id' => 'name', 'placeholder' => ''])}}
                </div>
                <div class="modal-footer">
                    {{Form::hidden('id', $viewAccount->id )}}
                    {{Form::submit('編集', ['class'=> 'btn btn-primary'])}}
                    <button type="button" class="btn btn-default" data-dismiss="modal">キャンセル</button>
                </div>
            {{Form::close()}}
        </div>
    </div>
</div>
<!-- モーダルへ値渡し -->

<script>
$(function() {

    $('#editModal').on('show.bs.modal', function(event) {
    // モーダルを開いたボタンを取得
    var button = $(event.relatedTarget);
    // data-watashiの値取得
    var watashi = button.data('watashi');
    // alert(JSON.parse(watashi));
    // モーダルを取得
    var modal = $(this);
    //受け取った値をgroupタグのとこに表示
    modal.find('#group').text(watashi+'の');
    });
});
</script>
