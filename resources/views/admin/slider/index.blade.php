@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content_header')
    <h1>لیست اسلایدر</h1>
@stop

@section('content')

<a class="btn btn-success" href="song">اضافه کردن آهنگ</a><br><br>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">نام</th>
            <th scope="col">عکس</th>
            <th scope="col">تغییر</th>

        </tr>
        </thead>
        <tbody>







        @foreach($slider as $slide)
            <tr>
                <th scope="row">{{$slide->id}}</th>
                <td>{{$slide->name}}</td>

                   <td>
                       @foreach($slide->file as $file)

                           <img class="img-thumbnail" style="width: 100px" src="<?= url('/images/song_image/'.$file->image)?>"/>



                       @endforeach
                   </td>




                <td>

                    <a class="btn btn-danger" href="slider/{{$slide->id}}/update">حذف</a>


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