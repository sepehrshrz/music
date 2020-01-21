@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content_header')
    <h1>ایجاد آهنگ</h1>
@stop

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">ساخت آهنگ</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="post" action="<?= url('music/song') ?>" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>نام</label>
                                <input type="text" class="form-control" name="name" value="{{old('name')}}">
                            </div>
                            <div class="form-group">
                                <label>توضیح</label>
                                <input type="text" class="form-control" name="title" value="{{old('title')}}">
                            </div>
                            <div class="form-group">
                                <label>متن</label>
                                <input type="text" class="form-control" name="lyric" value="{{old('lyric')}}">
                            </div>
                            <div class="form-group">
                                <label>زمان</label>
                                <input type="text" class="form-control" name="duration" value="{{old('duration')}}">
                            </div>





                            <div class="form-group">
                                <label>خوانندگان</label>

                                <select class="form-control form-control-sm" name="artists" value="{{old('artists')}}">

                                    @foreach($art as $ar)
                                        <option>
                                            {{$ar->name}}
                                        </option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group">
                                <label>ژانر</label>
                                <input type="text" class="form-control" name="genre" value={{old('genre')}}>
                            </div>



                            <div class="form-group">
                                <label>آلبوم</label>

                                <select class="form-control form-control-sm" name="album" value="{{old('album')}}">


                                        <option>
                                            {{$id->name}}
                                        </option>


                                </select>
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