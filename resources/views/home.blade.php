@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    <br><br>
                    <ul>
    
    <li>
        <a href="http://127.0.0.1:8000/slave" target="_self">
            SM 예제
        </a>
    </li>
    <br>
    <li>
        <a href="http://127.0.0.1:8000/profile" target="_self">
            Profile 예제
        </a>
    </li>
    <br>
    <li>
        <a href="http://127.0.0.1:8000/page" target="_self">
            Page 예제(post url옆에 이름을 쓰세요)
        </a>
    </li>
    <br>
    <li>
        <a href="http://127.0.0.1:8000/basicdb" target="_self">
            Basic DB 예제
        </a>
    </li>   
    <br>
    <li>
        <a href="http://127.0.0.1:8000/board" target="_self">
            ★게시판 예제★
        </a>
    </li>
    <br>
    <li>
        <a href="http://127.0.0.1:8000/home" target="_self">
            ★회원(Auth) + 게시판 결합 예제★
        </a>
    </li>

    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
