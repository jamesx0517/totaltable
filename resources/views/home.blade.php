@extends('layouts.app')
@section('script')
<script>
var pid = {{Auth::user()->pid}}
var id = {{Auth::user()->id}}
if (pid==1){
  $('#form').attr('href', '/pcrepairs/');
}
else{
  $('#form').attr('href', '/clients/');
}
  </script>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a class="btn btn-primary" id=app  href='/application'>需求申請</a>
                    <a class="btn btn-primary" id=form  href=>維修紀錄</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
