<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function page($pageId)
    {
    
    if($pageId == 'test')
        abort(404);  // /test이면 404 에러 발생
    return view('page' , ['pageName' => $pageId]);
    //return '안녕하세요 '.$pageId.'입니다.';
    }
}
