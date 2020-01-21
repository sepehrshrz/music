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






        @foreach($history as $hist)
            <tr>

                @foreach($hist->song as $song)

                <th scope="row">{{$song->id}}</th>
                <td>{{$song->name}}</td>
                        @foreach($song->artists as $artist)
                            <td>{{$artist->name}}</td>

                            @endforeach
                        @foreach($song->genre as $genre)
                            <td>{{$genre->genre_name}}</td>


                    @endforeach

                 @endforeach

                 <td>{{$hist->created_at}}</td>

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