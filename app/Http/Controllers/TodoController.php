<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// 원래 request 방식
// use Request;
use DB; // DB 사용
use App\Todo;

class TodoController extends Controller
{
    public function store(Request $request)
    {
        // 기본적 예제
        /*
        // $title = Request::input('title'); 
        // title만 출력(새로운 형태 출력법)
        // return $title;          
        // title만 출력
        // dd(Request::all());  
        // 전체 값(새로운 형태 출력법)
        // dd($request->all()); 
        // 원래 전체 값 출력하는 법
        */

        // <<insert 하는 방법>>
        // 1번째 방법
        /*
        $title = $request->input('title');
        DB::insert('insert into todos (title) VALUES(?)', [$title]);
        */
        // 2번째 방법
        /*
        $title = $request->input('title');
        DB::table('todos')->insert(['title'=>$title]);
        */
        // 3번째 방법
        //table이 model을 가지고 있다. 이 model로 table을 조정
        // php artisan make:model Todo 로 Todo 모델 생성
        // 3-1번째 방법
        /*
        $title = $request->input('title'); 
        $todo = new Todo();
        $todo->title = $title;
        $todo->save();
        */
        // 3-2번째 방법(model은 단수 table은 복수로 쓰는게 좋고 
        // model을 단수형 todo, table을 todos로 해도 인식되어 사용가능)
        // create 함수 생성 X, 그냥 생성한다는 선언
        $title = $request->input('title');
        Todo::create([
            'title'=>$title
        ]);
        
        // insert할 떄 todo에 남아있지 않고 초기화면('/')올 이동(경로 지정 가능)
        return redirect('/basicdb');
    }
    // 속성 done 변경 함수
    public function done($id)
    {
        // find는 DB에서 검색해서 가져오는 것
        $todo = Todo::find($id);
        if($todo->done == 1)
            $todo->done = 0;
        else
            $todo->done = 1;
        $todo->save();
        
        return redirect('/basicdb');
    }
    // 튜플 삭제 함수
    public function destroy($id)
    {
        $todo = Todo::find($id);
        $todo->delete();

        return redirect('/basicdb');
    }
}
