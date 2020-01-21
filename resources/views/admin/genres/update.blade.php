@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content_header')
    <h1>هنرمند جدید</h1>
@stop

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">هنرمند جدید</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="post" action="<?= url('music/artist/'.$artist->id) ?>" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="form-group">
                                <label>نام</label>
                                <input type="text" class="form-control" name="name" value="{{$artist->name}}">
                            </div>
                            <div class="form-group">
                                <label>نام هنری</label>
                                <input type="text" class="form-control" name="nick_name" value="{{$artist->nick_name}}">
                            </div>
                            <div class="form-group">
                                <label>سرگذشت</label>
                                <input type="text" class="form-control" name="biography" value="{{$artist->biography}}">
                            </div>
                            <div class="form-group">
                                <label>تولد</label>
                                <input type="text" class="form-control" name="birthday" value="{{$artist->birthday}}">
                            </div>







                            <div class="form-group">
                                <label>عکس</label>
                                <input type="file" class="form-control" name="image" value="{{$storage}}">
                                <img class="img-thumbnail" style="width: 100px" src="<?= url($storage)?>"/>
                            </div>

                            <button type="submit" class="btn btn-success">ایجاد</button>
                        </form>

                    </div>
                    <form action="<?= url('music/artist/'.$artist->id) ?>" method="post">
                        @method('delete')
                        <button type="submit" class="btn btn-danger">حذف</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/adminpanel.css">
    <link rel="stylesheet" href="public/css/bootstrap-rtl.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop