@extends('layouts.app')
@section('script')
<script>
var post_id = {{ $id }};
$(function() {
    $.getJSON('/api/pcrepairs/' + post_id, function(data) {
        console.log(data);
        $('#id').html(data.id);
        $('#date').html(data.date);
        $('#pid').html(data.pid);
        $('#uid').html(data.uid);
        $('#project').html(data.project);
        $('#title').html(data.title);
        $('#note').html(data.note);
        $('#status').html(data.status);
        $('#it').html(data.it);
        $('#enddate').html(data.enddate);
        $('#nature').html(data.nature);

    });
});
</script>
@endsection


@section('content')
<div class="container">
    <div class="col-md-8 col-md-offset-2">
        <h1>維修查詢</h1>
        <table class="table" style="width: 750px;">
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
          <h1 id= 'note'></h1>
          <table class="table" style="width: 750px;">
            <th>處理進度</th> <th >
            <select ><option value="4">等待處理中
                     <option value="1">處理中
                     <option value="2">採購中
                     <option value="3">已結案
            </select></th>

            <th>指派人</th> <th ><input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" readonly /></input></th>
            <th>結案日期</th> <th id='enddate'>主旨</th>
        </table>
    </div>
</div>
@endsection
