@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content_header')
    <h1>ژانر جدید</h1>
@stop

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">ژانر جدید</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="post" action="<?= url('music/genre') ?>" >
                            @csrf

                            <div class="form-group">
                                <label>نام ژانر</label>
                                <input type="text" class="form-control" name="genre_name" value="{{old('genre_name')}}">
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