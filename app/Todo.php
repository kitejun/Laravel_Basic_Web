<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/*
    Todo::create(['title' => $request->input('title')]);
    $todo=Todo::firstOrCreate(['title'=>$request->input('title')]);
    // 찾아보고 없으면 DB에 추가
    $todo=Todo::firstOrNew(['title'=>$request->input('title')]);
    // 찾아보고 없으면 인스턴스 생성
*/
class Todo extends Model
{
    // 조작 가능한 속성을 지정해줌으로서 보안을 강화하는 것
    // fillable - 조작 가능한 속성을 지정(white-list)
    // guarded - 보호해야할 속성을 지정(black-list)
    protected $fillable = ['title'];    // title을 채울 수 있다.
    // $guarded = ['title'];            //  title 뺴고 모두  채울 수 없다.

    // <소프트 삭제>
    // 삭제를 하면 테이블 상에서는 제거가 안 되고
    // deleted_at에 삭제한 일자 저장
    //use SoftDeletes;
    //protected $dates = ['deleted_at'];
}
