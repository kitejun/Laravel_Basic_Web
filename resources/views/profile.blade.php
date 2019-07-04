@extends('master')

@section('content')

<h2>*Profile 예제*</h2>
<br>
{{ $greeting }} 제 이름은 {{ $name }}입니다.
<br>
제 프로필은 {{ $profile }} 누르세요  
<br>
<a href="http://127.0.0.1:8000/user/profileTwo" target="_self">
    Profile 보러가기
</a>
@stop