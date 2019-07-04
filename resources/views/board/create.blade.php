@extends('master')
@section('content')

<h2>글 작성하기</h2>
<form method="post" action="{{ route('board.index') }}" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class='form-group'>
        <label name="title" for="title">제목</label>
        <input type="text" name="title" class="form-control" value=""/>
    </div>

    <div class="form-group">
        <label name="file" for="file">파일</label>
        <input type="file" name="thumbnail" value=""/>
    </div>

    <div class='form-group'>
        <label name="body" for="body">내용</label>
        <textarea name="body" class="form-control"></textarea>
    </div>  

    <div class='form-group'>
        <input type="submit" value="생성하기" class="btn btn-primary">
    </div>  
</form>

<!--
    Validator(입력값의 유효성 검사를 위해서 제공되는 클래스)
    Board.php 참고
-->
@if($errors->any())     <!-- error가 1개 라도 있다면~ -->
    <div role="alert">
        <span class='glyphicon glyphicon-exclamation-sign' aria-hidden="true"></span>
        <span class="sr-only">Error:</span>
        @foreach ($errors->all() as $message)
            {{ $message }}
        @endforeach
    </div>
@endif
@stop