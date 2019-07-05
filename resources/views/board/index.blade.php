@extends('master')
@section('content')

<h2>*게시판 예제*</h2>
@if($user->email==$boards->email)
    ★ 현재 접속 ID: {{ $user->email }} ★
else
@endif 

<ul>
    @foreach($boards as $board)
        <li>
            <a href="{{ route("board.show", $board->id) }}">{{ $board->title }}</a>
        </li>
    @endforeach
</ul>

{!! $boards->render() !!}

<button>
    <a href="{{ route('board.create') }}"> 글 작성하기</a>
</button>

@stop