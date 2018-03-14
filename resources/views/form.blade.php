@extends('layouts.app')
@section('script')
<script>
function getQueryParams(qs) {
    qs = qs.split('+').join(' ');

    var params = {},
        tokens,
        re = /[?&]?([^=]+)=([^&]*)/g;

    while (tokens = re.exec(qs)) {
        params[decodeURIComponent(tokens[1])] = decodeURIComponent(tokens[2]);
    }

    return params;
}

var query = getQueryParams(document.location.search);
var page = '';

// 如果有 ?page=[int]
if( query.page != undefined )
    page = '?page=' + query.page;

$(function() {

    $.getJSON('/api/pcrepairs' + page, function(resp) {

        for( var index in resp.data) {
            var obj = resp.data[index];
            $('#tbody').append('<tr><td>' + obj.id + '</td><td>'+ obj.pid + '</td><td>'+ obj.uid + '</td><td>'+ obj.date + '</td><td><a href="/pcrepairs/' + obj.id + '">'+ obj.title + '</a></td><td>'+ obj.category + '</td><td>'+ obj.status + '</td><td>'+ obj.it + '</td><td>'+ obj.enddate + '</td></tr>');
        }


if( resp.next_page_url == null ) {
    $('#btn-next').hide();
    $('#btn-pre').attr('href', resp.prev_page_url.replace('api/', ''));
} else if( resp.prev_page_url == null ) {
    $('#btn-pre').hide();
    $('#btn-next').attr('href', resp.next_page_url.replace('api/', ''));
}

// 將翻頁 url 填入按鈕


$('#btn-next').attr('href', resp.next_page_url.replace('api/', ''));
$('#btn-pre').attr('href', resp.prev_page_url.replace('api/', ''));
});
});
</script>

@endsection

@section('content')
<div class="container">
    <div class="col-md-8 col-md-offset-2">
        <h1>維修查詢</h1>
        <table class="table" style="width: 770px;" >
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
        <a class="btn btn-primary" id="btn-pre">上一頁</a>
        <a class="btn btn-primary" id="btn-next">下一頁</a>
    </div>
</div>
@endsection
