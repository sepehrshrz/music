@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content_header')
    <h1>لیست آهنگها</h1>
@stop

@section('content')

<a class="btn btn-success" href="create">اضافه کردن آهنگ</a><br><br>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">نام</th>
            <th scope="col">خوانندگان</th>
            <th scope="col">ژانر</th>
            <th scope="col">البوم</th>
            <th scope="col">تاریخ ها</th>
            <th scope="col">عکس</th>
            <th scope="col">نمایش</th>
            <th scope="col">تغییرات</th>
            <th scope="col">اسلایدر</th>
        </tr>
        </thead>
        <tbody>







        @foreach($songs as $song)
            <tr>
                <th scope="row">{{$song->id}}</th>
                <td>{{$song->name}}</td>

                <td>
                @foreach($song->artists as $art)
                {{$art->name}}<br>
                @endforeach
                </td>
                <td>
                    @foreach($song->genre as $genre)
                        {{$genre->genre_name}}<br>
                    @endforeach
                </td>
                <td>
                    @if($song->album)
                    {{$song->album->name}}
                        @endif
                </td>

                <td>{{$song->created_at}}</td>

                <td>
                    @foreach($song->file as $file)

                    <img class="img-thumbnail" style="width: 100px" src="<?= url('/images/song_image/'.$file->image)?>"/>



                    @endforeach
                </td>

                <td>
                        <button class="btn btn-warning" type="submit"><a href="song/{{$song->id}}">نمایش</a></button>


                </td>
                <td>

                    <a class="btn btn-danger" href="song/{{$song->id}}/edit">تغییرات</a>


                </td>
                <td>
                    <a class="btn btn-success" href="slider/{{$song->id}}/true">نمایش در اسلایدر</a>

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