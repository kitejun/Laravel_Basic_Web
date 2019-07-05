<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//
use Illuminate\Support\Facades\input;
use Validator;
use App\Board;
use Illuminate\Support\Facades\Auth;
//

class BoardController extends Controller
{
    // board의 목록 보여주는 함수
    public function index()
    {
        // Paginator로 가져오는 것
        $boards = board::orderBy('created_at', 'desc')->paginate(5); // desc: 최근 순, 5개씩
        
        $user=Auth::user();
        return view('board.index', compact('boards','user'));

    }

    // board의 작성하는 화면을 보여주는 역할을 수행
    public function create()
    {
        if (Auth::check()) {
            return view('board.create');
        }
        else{
            return redirect()->route('login');
        }
    }

    // create()에서 작성한 내용을 실제 DB에 넣는 역할을 수행
    public function store(Request $request)
    {
        // Validator: 입력값의 유효성 검사를 위해서 제공되는 클래스
        $validator = Validator::make($data = Input::all(), Board::$rules);
        if ($validator->fails()){
            // 오류 발생 시 이전 page로 넘어가라 단, 오류 정보와 함께
            return redirect()->back()->withErrors($validator->error())->withInput();
        }

        $board = new Board;

         // 파일 처리
         if(Input::hasFile('thumbnail')){
            $thumbnail = Input::file('thumbnail');
            $newFileName = time().'-'.$thumbnail->getClientOriginalName();
            // 여기서 storage_path는 storage폴더에 files에 저장
            // Error 발생시 storage에 Permission 필요
            $thumbnail->move(storage_path().'/files/', $newFileName); // storage/files에 이 파일(thumbnail)을 이동하겠다.
            $board->thumbnail = $newFileName;
        }

        // 저장 부분
        $board->title = Input::get('title');
        $board->body = Input::get('body');
        $board->email = Auth::user()->email;

        $board->save(); // save method 실행

        return redirect()->route('board.index'); //index로 다시 이동해라
    }

    // 목록에서 선택된 post를 출력하는 역할을 수행
    public function show($id)
    {
        $user=Auth::user();

        // id를 찾아 받아서 post에 넣어라 
        $board = Board::findOrFail($id);
        return view('board.show', compact('board','user'));
    }

    // 목록에서 수정하기를 눌러 post를 수정하는 화면을 보여주는 역할을 수행
    public function edit($id)
    {
        $board = Board::find($id);
        
        if (Auth::check()) {
            if($board->email == Auth::user()->email) {
                return view('board.edit', compact('board'));
            }
            else{
                return redirect()->route('board.index');
            }
        }
        else{
            return redirect()->route('board.index');
        }
    }

    // edit()에서 변경한 내용을 실제 DB에 update하는 역할 수행
    public function update(Request $request, $id)
    {
        $board = Board::findOrFail($id);

        $validator = Validator::make($data = Input::all(), Board::$rules);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $board->update($data);
        return redirect()->route('board.index');
        
    }

    // board를 삭제하는 역할 수행
    public function destroy($id)
    {
        $board = Board::find($id);
        if (Auth::check()) {
            if($board->email == Auth::user()->email) {
                Board::destroy($id);
                return redirect()->route('board.index');
                
            }
            else{
                return redirect()->route('board.index');
            }
        }
        else{
            return redirect()->route('board.index');
        }    
    }
}
