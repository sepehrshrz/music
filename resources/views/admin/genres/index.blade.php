@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content_header')
    <h1>لیست ژانرها</h1>
@stop

@section('content')

    <a class="btn btn-success" href="<?= url('music/genre/create')?>">اضافه کردن هنرمند</a><br><br>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">نام</th>

            <th scope="col">حذف</th>
        </tr>
        </thead>
        <tbody>

        {{--nick_name--}}
        {{--biography--}}
        {{--birthday--}}





        @foreach($genres as $gen)
            <tr>
                <th scope="row">{{$gen->id}}</th>
                <td>{{$gen->genre_name}}</td>


                <td>

                    <form action="<?= url('music/genre/'.$gen->id) ?>" method="post">

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