@extends('layouts.app')
@section('script')
<script>
$(function() {

    $.getJSON('/api/pcrepairs' , function(resp) {

        for( var index in resp ) {
            var obj = resp[index];
            $('#tbody').append('<tr><td>' + obj.id + '</td><td>'+ obj.pid + '</td><td>'+ obj.uid + '</td><td>'+ obj.date + '</td><td><a href="/pcrepairs/' + obj.id + '">'+ obj.title + '</a></td><td>'+ obj.category + '</td><td>'+ obj.status + '</td><td>'+ obj.it + '</td><td>'+ obj.enddate + '</td></tr>');
        }
      }
    );
  }
);


</script>

@endsection

@section('content')
<div class="container">
    <div class="col-md-8 col-md-offset-2">
        <h1>維修查詢</h1>
        <table class="table" >
            <thead>
                <tr>
                    <th>單號</th>
                    <th>申請單位</th>
                    <th>申請人</th>
                    <th>申請日期</th>
                    <th>主旨</th>
                    <th>總類</th>
                    <th>處理進度</th>
                    <th>指派人</th>
                    <th>結案日期</th>
                </tr>
            </thead>
            <tbody id="tbody">

            </tbody>
        </table>

    </div>
</div>
@endsection
