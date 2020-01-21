@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content_header')
    <h1>نمایش</h1>
@stop

@section('content')

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">نام</th>
            <th scope="col">نام هنری</th>
            <th scope="col">زندگی نامه</th>
            <th scope="col">تولد</th>

            <th scope="col">عکس</th>
            {{--<th scope="col">نمایش</th>--}}
            {{--<th scope="col">تغییرات</th>--}}
        </tr>
        </thead>
        <tbody>







        {{--@foreach($songs as $song)--}}
        <tr>
            <th scope="row">{{$artist->id}}</th>

            <td>{{$artist->name}}</td>

            <td>

                    {{$artist->nick_name}}<br>

            </td>
            <td>

                    {{$artist->biography}}<br>

            </td>
            <td>
          {{$artist->birthday}}
            </td>


            <td>

                <img class="img-thumbnail" style="width: 100px" src="<?= url($storage)?>"/>




            </td>

            {{--<td>--}}
            {{--<form action="../song/{{$song->id}}" method="get">--}}

            {{--<button class="btn btn-warning" type="submit">نمایش</button>--}}
            {{--</form>--}}
            {{--</td>--}}
            {{--<td>--}}

            {{--<a class="btn btn-danger" href="song/{{$song->id}}/edit">تغییرات</a>--}}


            {{--</td>--}}
        </tr>
        {{--@endforeach--}}
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
