@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content_header')
    <h1>لیست آهنگها</h1>
@stop

@section('content')

    <a class="btn btn-success" href="create">اضافه کردن آهنگ</a><br><br>



    <table class="table table-striped table-dark">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">شماره کاربری</th>
            <th scope="col">نام</th>
            <th scope="col">ایمیل</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">1</th>
            <td>{{$history[0]->user->id}}</td>
            <td>{{$history[0]->user->name}}</td>
            <td>{{$history[0]->user->email}}</td>
        </tr>

        </tbody>
    </table>




    <table class="table">
        <thead>
        <tr>

            <th scope="col">ژانر</th>
            <th scope="col">تعداد آهنگهای گوش داده</th>

        </tr>
        </thead>
        <tbody>

                @for ($x=0;$x<count($result);$x++)




                    <tr>


                    <th scope="row">{{$b=array_keys($result[$x])[0]}}</th>
                        <td>{{$result[$x][$b]}}</td>
                    </tr>

                @endfor

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