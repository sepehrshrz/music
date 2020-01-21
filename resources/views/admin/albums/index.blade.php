@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content_header')
    <h1>لیست آلبوم ها</h1>
@stop

@section('content')

    <a class="btn btn-success" href="<?= url('music/album/create')?>">اضافه کردن آلبوم</a><br><br>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">نام</th>

            <th scope="col">نمایش</th>
            <th scope="col">تغییرات</th>
        </tr>
        </thead>
        <tbody>

        {{--nick_name--}}
        {{--biography--}}
        {{--birthday--}}





        @foreach($albums as $album)
            <tr>
                <th scope="row">{{$album->id}}</th>
                <td>{{$album->name}}</td>
                <td>

                    @foreach($album->file as $file)

                        <img class="img-thumbnail" style="width: 100px"
                             src="<?= url('/images/album_image/' . $file->image)?>"/>



                    @endforeach
                </td>



                <td>
                    <button class="btn btn-warning" type="submit"><a href="album/{{$album->id}}">نمایش</a></button>


                </td>
                <td>

                    <form action="<?= url('music/album/'. $album->id) ?>" method="post">
                        @method('delete')
                        <button type="submit" class="btn btn-danger">حذف</button>
                    </form>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{--{!! $song->render() !!}--}}

@stop

@section('css')
    <link rel="stylesheet" href="/css/adminpanel.css">
    <link rel="stylesheet" href="public/css/bootstrap-rtl.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop