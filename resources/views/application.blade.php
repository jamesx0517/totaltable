@extends('layouts.app')
@section('script')
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">維修申請</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">


                        </div>

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">主旨</label>

                            <div class="col-md-6">
                                <input id="title" type="text" name="title" value= >


                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="note" class="col-md-4 col-form-label text-md-right">內容</label>

                            <div class="col-md-6">
                                <textarea  id="note" type="textarea"  name="note" class="form-control">

                                </textarea>
                            </div>
                        </div>



                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    送出
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
