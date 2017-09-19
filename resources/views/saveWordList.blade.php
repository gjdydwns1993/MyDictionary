@extends('layouts.layout')
@section('content')
<center>
    <table class="table table-hover">
        <thead>
            <tr>
                <th class="thcolor">번호</th>
                <th class="thcolor">일본어</th>
                <th class="thcolor">한국어</th>
            </tr>
        </thead>
            @foreach($result as $word)
            <tr>
                <td class="col s3">{{$word->id}}</td>
                <td class="center-align">{{$word->japanese}}</td>
                <td class="col s4">{{$word->korean}}</td>
            </tr>
            @endforeach
    </table>
    {!! $result->render() !!}
</center>
@endsection