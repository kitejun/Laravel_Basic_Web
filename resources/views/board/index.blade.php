@extends('master')
@section('content')

<h2>*게시판 예제*</h2>
    ★ 현재 접속 ID: {{ $user->email }} ★

<ul>
    @foreach($boards as $board)
        <li>
            <a href="{{ route("board.show", $board->id) }}">{{ $board->title }}</a>
        </li>
    @endforeach
</ul>

<div class="container-fluid row">
    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1" style="float: none; margin: 0 auto;">
        {{$boards->render()}}
    </div>
</div>

 <button>{{$boards->total()	}}</button> 
 <button>{{$boards->count()	}}</button> 
 <button>{{$boards->currentPage()	}}</button>
<button>
    <a href="{{ route('board.create') }}"> 글 작성하기</a>
</button>

@stop