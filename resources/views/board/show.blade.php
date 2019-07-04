@extends('master')
@section('content')
    <h2>[{{$board->id}}]번 글</h2>
    <br>
    <h3>제목: {{ $board->title }}</h3>
    <p>
        <strong>내용:</strong><br>
        {{ $board->body }}
    </p>
    <p>
        <strong>이미지:</strong><br>
        {{ $board->thumbnail }}
    </p>
    <!-- 값 같이 보낼 때 쓰는 것 route -->
    
        <h3>
       
        <button>
            <a href="{{ route('board.edit', $board->id) }}">글 수정하기</a>
        </button>

        <form method="board" action="{{ route('board.destroy', $board->id) }}">
            <input type="hidden" name='_token' value='{{ csrf_token() }}'>
            <input type="hidden" name="_method" value='delete'>
            <button>글 삭제하기</button>
        </form>

        <button>
            <a href="{{ route('board.index') }}"> 목록으로 </a>
        </button>
    </h3> 

@stop