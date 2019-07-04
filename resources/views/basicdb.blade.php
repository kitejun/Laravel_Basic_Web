@extends('master')
@section('content')
  
<h2>*Basic DB 예제*</h2>
    <form method="post" action="/todo">
    <!-- post방식이면 form 안에 csrf를 써야 한다. -->
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
 
        <label>할일</label>
        <input type="text" name="title">
        <input type="submit">
    </form>
    @foreach($todos as $todo)
        <!-- 중괄호 쓰면 echo 기능 -->
        <p>

            @if($todo->done==1)
                <span style="text-decoration: line-through">
            @endif

            {{ $todo['id'] }}. {{ $todo['title'] }}
            
            @if($todo->done==1)
                </span>
            @endif
            <form method="post" action="/todo/done/{{$todo->id}}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="submit" value="<?php echo $todo->done == 1 ? "취소":"완료";?>">
            </form>
            <!--  
                HTML form은 실제로 PUT, PATCH와 DELETE 액션을 지원하지 않습니다.
                따라서 PUT, PATCH이나 DELETE로 지정된 라우트를 호출하는 HTML form을
                정의한다면 _method의 숨겨진 필드를 지정해야 합니다.
            -->
            
            <form method="post" action="/todo/{{$todo->id}}">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <input type="submit" value="삭제">
            </form>
        </p>
    @endforeach

@endsection