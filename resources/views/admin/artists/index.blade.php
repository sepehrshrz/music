@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content_header')
    <h1>لیست هنرمندان</h1>
@stop

@section('content')

    <a class="btn btn-success" href="<?= url('music/artist/create')?>">اضافه کردن هنرمند</a><br><br>
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





        @foreach($artist as $art)
            <tr>
                <th scope="row">{{$art->id}}</th>
                <td>{{$art->name}}</td>


                <td>
                    <button class="btn btn-warning" type="submit"><a href="artist/{{$art->id}}">نمایش</a></button>


                </td>
                <td>

                    <a class="btn btn-danger" href="artist/{{$art->id}}/edit">تغییرات</a>


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