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
                            <form method="post" action="<?= url('music/album') ?>" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>نام</label>
                                    <input type="text" class="form-control" name="name" value="{{old('name')}}">
                                </div>

                                <div class="form-group">
                                    <label>عکس</label>
                                    <input type="file" class="form-control" name="image" value={{old('image')}}>
                                </div>

                                <button type="submit" class="btn btn-success">ایجاد</button>
                            </form>
                    </div>
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