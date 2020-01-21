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
            <th scope="col">خوانندگان</th>
            <th scope="col">ژانر</th>
            <th scope="col">دسته بندی</th>
            <th scope="col">آلبوم</th>
            <th scope="col">تاریخ ها</th>
            <th scope="col">عکس</th>
            {{--<th scope="col">نمایش</th>--}}
            {{--<th scope="col">تغییرات</th>--}}
        </tr>
        </thead>
        <tbody>







        {{--@foreach($songs as $song)--}}
            <tr>
                <th scope="row">{{$song->id}}</th>

                <td>{{$song->name}}</td>

                <td>
                    @foreach($artists as $art)
                        {{$art->name}}<br>
                    @endforeach
                </td>
                <td>
                    @foreach($genre as $gen)
                        {{$gen->genre_name}}<br>
                    @endforeach
                </td>
                <td>
{{--                    {{$category[0]->name}}--}}
                    {{--@foreach($category as $cat)--}}
                        {{--{{$cat->name}}<br>--}}
                    {{--@endforeach--}}
                </td>
                <td>{{$album['name']}}</td>
                <td>{{$song->created_at}}</td>

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
