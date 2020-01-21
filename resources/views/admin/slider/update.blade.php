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
                    <div class="card-header">به روزرسانی آهنگ</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="post" action="<?= url('music/song/'.$song['id']) ?>" enctype="multipart/form-data">
                            @method('put')
                            @csrf


                            <div class="form-group">
                                <label>نام</label>
                                <input type="text" class="form-control" name="name" value="{{$song['name']}}">
                            </div>

                            <div class="form-group">
                                <label>توضیح</label>
                                <input type="text" class="form-control" name="title" value="{{$song['title']}}">
                            </div>
                            <div class="form-group">
                                <label>متن</label>
                                <input type="text" class="form-control" name="lyric" value="{{$song['lyric']}}">
                            </div>
                            <div class="form-group">
                                <label>زمان</label>
                                <input type="text" class="form-control" name="duration" value="{{$song['duration']}}">
                            </div>





                            <div class="form-group">
                                <label>خوانندگان</label>


                                <select class="form-control form-control-sm" name="artists">
                                     <option> @foreach($artists as $arti){{$arti->name}}@endforeach</option>
                                    @foreach($art as $ar)
                                        <option>
                                            {{$ar->name}}
                                        </option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group">
                                <label>ژانر</label>


                                <select class="form-control form-control-sm" name="genre">
                                    <option> @foreach($genre as $gen){{$gen->genre_name}}@endforeach</option>
                                    @foreach($genress as $genr)
                                        <option>
                                            {{$genr->genre_name}}
                                        </option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group">
                                <label>آلبوم</label>


                                <select class="form-control form-control-sm" name="album"  >
                                    <option>
                                         @if($album)
                                        {{$album->name}}
                                             @endif
                                    </option>


                                    @foreach($albums as $album)
                                        <option>
                                            {{$album->name}}
                                        </option>
                                    @endforeach

                                </select>
                            </div>




                            <div class="form-group">
                                <label>عکس</label>
                                <input type="file" class="form-control" name="image" value= ""/>
                                <img class="img-thumbnail" style="width: 100px" src="<?= url($storage)?>"/>
                            </div>

                            <button type="submit" class="btn btn-success">تغییر</button>
                        </form>


                    </div>
<form action="<?= url('music/song/'.$song['id']) ?>" method="post">
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