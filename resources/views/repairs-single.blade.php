@extends('layouts.app')
@section('script')
<script>
var post_id = {{ $id }};
$(function() {
    $.getJSON('/api/pcrepairs/' + post_id, function(data) {
        console.log(data);
        $('#id').html(data.id);
        $('#date').html(data.date);
        $('#title').html(data.title);
        $('#pid').html(data.pid);
        $('#note').html(data.note);
        $('#body').append('<hr>' + data.created_at);
    });
});
</script>
@endsection


@section('content')
<div class="container">
    <div class="col-md-8 col-md-offset-2">
        <h1>維修查詢</h1>
        <table class="table" style="width: 880px;">
            <thead>
                <tr>
                    <th>單號</th>
                    <th>申請單位</th>
                    <th>申請人</th>
                    <th>申請日期</th>
                    <th>主旨</th>
                    <th>維修項目</th>
                    <th>需求性質</th>
                    <th>處理進度</th>
                    <th>指派人</th>
                    <th>結案日期</th>
                </tr>
            </thead>
            <tbody id="tbody">
<td><h2 id= id></h2></td>
<td><h3 id= pid></h3></td>

            </tbody>
        </table>
    </div>
</div>
@endsection
