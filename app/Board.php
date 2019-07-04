<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//  php artisan make:model Post 으로 Model 생성 테이블 이름은 users

class Board extends Model
{
    // Validator(입력값의 유효성 검사를 위해서 
    // 제공되는 클래스)의 Rule
    public static $rules = [    // 작성할 때 제목과 내용은
        'title' => 'required',  // 무조건 들어가라(Rule 지정)
        'body' => 'required'    
    ];

    // fillable 속성은 사용자입력으로 부터 값을 할당할 때 
    // 허용하는 필드들을 지정하는 속성
    protected $fillable = ['title', 'body', 'thumbnail'];

}
