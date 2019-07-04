<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;


class BasicDBController extends Controller
{
    public function index()
    {
        // 모든 레코드 가져오기
        $todos=Todo::all();
        // <소프트 삭제>
        // 테이블상에서 삭제되지 않고 delete_at에 표시된것도 가져오기
        // $todos=Todo::withTrashed()->get();
        // 삭제된 모델들만 조회하기(휴지통)
        // $todos = Todo::onlyTrashed()->all();
        // 삭제된 모델(휴지통) 복원하기
        // $todos->restore();
        

        return view('basicdb', compact('todos'));
        // compct는 받은 값 넘겨주는 함수(
        // return view('main', compact('todos'));와 
        // return view('main', ['todos'=>$todos]);는 같다.
        
    }
}