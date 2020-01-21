@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content_header')
    <h1>نمایش</h1>
@stop

@section('content')
    <a class="btn btn-success" href=<?=url("music/album/$album->id/create_song")?>>اضافه کردن آهنگ</a><br><br>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">نام آلبوم</th>


            <th scope="col">عکس</th>
            {{--<th scope="col">نمایش</th>--}}
            {{--<th scope="col">تغییرات</th>--}}
        </tr>
        </thead>
        <tbody>







        {{--@foreach($songs as $song)--}}
        <tr>
            <th scope="row">{{$album->id}}</th>

            <td>{{$album->name}}</td>




            <td>

                <img class="img-thumbnail" style="width: 300px" src="<?= url($storage)?>"/>




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
           <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">نام</th>
            <th scope="col">توضیح</th>
            <th scope="col">تغییرات</th>
            <th scope="col">حذف</th>

            {{--<th scope="col">نمایش</th>--}}
            {{--<th scope="col">تغییرات</th>--}}
        </tr>
        </thead>
        <tbody>






{{--{{$song=$song[0]}}--}}
        {{--@foreach($songs as $song)--}}
        {{--<tr>{{dd([$song])}}--}}
            @foreach($song as $son)

{{--{{dd(sizeof($song))}}--}}
            <th scope="row">{{$son->id}}</th>

            <td>{{$son->name}}</td>
            <td>{{$son->title}}</td>

            <td>

            <a class="btn btn-warning" href=<?=url("music/song/$son->id/edit")?>>تغییرات</a><br>

            </td>
<td>
    <form action="<?= url('music/song/'.$son->id) ?>" method="post">

        @method('delete')
        <button type="submit" class="btn btn-danger">حذف</button>
    </form>
</td>

        </tr>

            @endforeach
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
