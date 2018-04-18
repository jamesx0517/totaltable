@extends('layouts.app')
@section('script')
<script>
var post_id = {{ $data->id }};
var itx;
var status;
$(function() {
    $.getJSON('/api/pcrepairs/' + post_id, function(data) {
        console.log(data);
        $('#id').html(data.id);
        $('#date').html(data.created_at);
        $('#pid').html(data.pid);
        $('#uid').html(data.uid);
        $('#project').html(data.project);
        $('#title').html(data.title);
        $('#note').html(data.note);
        $('#enddate').html(data.updated_at);
        $('#nature').html(data.nature);
        itx=data.it;
        statusx=data.status;
  });
    $.getJSON('/api/select/' + post_id, function(data) {
        console.log(data);
      //$('#status').html(data.status);
      //  $('#it').html(data.it);
        $("#status").prepend($("<option SELECTED></option>").attr("value", data.status).text(statusx));
        $("#it").prepend($("<option SELECTED></option>").attr("value", data.it).text(itx));

    });

      });




</script>
@endsection


@section('content')
<div class="container">
    <div class="col-md-8 col-md-offset-2">
      <div class="card-body">
        <h1>維修查詢</h1>
          <form method="POST" action="/it/{{ $data->id }}">
        <table class="table" style="width: 850px;">
            <thead>
                <tr>
                    <th >申請日期</th><th id='date'></th>
                    <th>單號</th>  <th id='id'></th>
                    <th>申請單位</th><th id='pid'></th>
                    <th>申請人</th><th id='uid'></th><tr>
                    <th>維修項目</th><th id='project'></th>
                    <th>需求性質</th><th id='nature'><tr>
                    <th>主旨</th>  <th id='title'>主旨</th><tr>

                </tr>
            </thead>
          </table>
          <h1>內容</h1>
          <h1 id= 'note'>需求內容</h1>
          <table class="table" style="width: 750px;" >
            <th>處理進度</th> <th>
            <select name='status'id='status'   >

                     <option value="4">等待處理中</option>
                     <option value="1">處理中</option>
                     <option value="2">採購中</option>
                     <option value="3">已結案</option>
            </select></th>

            <th>指派人</th><th >
            <select  name= 'it' id='it'>
                     <option value="1">倪堃木弘</option>
                     <option value="2">楊文捷</option>
            </select></th>
            <th>最後更新時間</th> <th id='enddate'>最後更新時間</th>
        </table>
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        <button type="submit" class="btn btn-primary">
            送出
        </button>

    </div>
</div>
</div>
@endsection
