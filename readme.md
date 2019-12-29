# Laravel 학습 프로젝트
##  Laravel의 기본 기능들이 모두 들어간 Web구현

__김연준(단독)__

### 0. 개요
------------------------------
1. Web framework 중 하나인 Laravel을 학습하여 Laravel마스터가 되고자 한다.

### 1. 제작 목적
------------------------------
기본기능을 통한 실력 향상

### 2. 역할 분담
------------------------------
 * 김연준: 백엔드, 프론트엔드, DB

### 3. 참고
------------------------------
 * https://laravel.kr/                                -> 공식 한국 페이지
 * https://laravel.co.kr/
 * https://www.youtube.com/playlist?list=PL_1fv4_9uPOOFzzvhfnXEa0toN_JzAqnz
 * http://ezphp.net/lecture/
 
### 4. Detail
------------------------------
* Framework: Laravel
 * Tool: Visual Code
 * 언어: php
 * 서버/DB: XAMPP(Apache, MySQL) 

### 5. 학습 노트(5버전)
------------------------------
<<Laravel 기본>>
준비사항
1. homestay 환경 조성(db는 기본적으로 maria db사용)
2. resource route 등록
3. controlloer 구성 
4. view 구성
5. eEloquent ORM
6. validation
7. pagination
8. file upload 사용해보기

프로젝트 할 때: composer require doctrine/dbal( (DB에 수정 할 때)

------------------------------

MVC 패턴
1. M: Eloquent ORM
2. V: Blade View
3. C: Controller

생성: composer create-project --prefer-dist laravel/laravel 프로젝트명
서버실행: php artisan serve
Controller 생성: php artisan make:controller 컨트롤러이름 (--resource)
>config\database.php에서 database연동 후 밑에 실행
// 
migration생성: php artisan make:migration 테이블이름
php artisan make:model 모델이름
//
같은 것: php artisan make:model 모델이름 --migration
-> 모델을 생성할 때 데이터 마이그레이션을 생성하고 싶다면 --migration 혹은 -m 옵션을 사용할 수 있습니다.
migrate로 테이블에 반영하기: php artisan migrate

ipconfig로 ip정보를 받고
 php artisan serve --host 192.168.0.107 로 서버 키기

.env 파일 변경 후 반영하기: php artisan config:cache

laravel chart: 
https://www.codermen.com/blog/84/how-to-use-charts-in-laravel-5-7-using-charts-package
https://laravelcode.com/post/laravel-5-chart-example-using-charts-package

------------------------------
<View>
resources\views에서 .blade.php를 생성후 작업

view생성
db->migration->eloquent 순으로 진행
controller로 만들고
route 설정을 해준다

Template 문법(view)
1. @extends('view 이름')
: 해당 view를 확장하는 방법으로 view를 구성합니다.
2. @section('section 이름') @stop
: 선언된 section 영역을 채우는 시작과 끝을 지정합니다.
3. @foreach @endforeach
: 반복문 구성
4. 기타
: route('라우트 이름'): f라우트 이름에 해당하는 url을 생성해줍니다.
: redirect('url'): 해당 경로로 리다이렉트
: redirect()-> route('라우트 이름') 해당 라우터 이름의 url로 이동

view에서 사용하는 문법
     <!-- 
        기타 문법
        1. 
        @for($i=0; $i<10; $i++)
            The current value is {{$i}}
        @endfor
        2.
        @forelse($users as $user)
            <li>{{$user->name}}</li>
        @endforelse
        3.
        @while(true)
            <p>I'm looping forever</p>
        @endwhile
        4.
        @foreach($todos as $todo)
            <!-- 중괄호 쓰면 echo 기능 -->
        <p>
            {{ $todo['id'] }}. {{ $todo['title'] }}
            <form method="post" action="/todo/done/{{$todo->id}}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="submit value="완료">
            </form>
        </p>        
       @endforeach
     -->
                                              
------------------------------
view생성
db->migration->eloquent 순으로 진행
controller로 만들고
route 설정을 해준다

Template 문법(view)
1. @extends('view 이름')
: 해당 view를 확장하는 방법으로 view를 구성합니다.
2. @section('section 이름') @stop
: 선언된 section 영역을 채우는 시작과 끝을 지정합니다.
3. @foreach @endforeach
: 반복문 구성
4. 기타
: route('라우트 이름'): f라우트 이름에 해당하는 url을 생성해줍니다.
: redirect('url'): 해당 경로로 리다이렉트
: redirect()-> route('라우트 이름') 해당 라우터 이름의 url로 이동

------------------------------
model 데이터
database에 migrations에서 데이터베이스를 만들고 eloquent로 모델 함수정의하고 db와 매칭
※ Migration이란?
: 데이터 베이스 테이블을 생성하고 테이블 구조를 변경할 수 있는 라라벨에서 제공하는 편리한 기능(클래스로 db를 조작 할 수 있다.)
php artisan make:migration 테이블이름      으로 생성
모델 php만들고 전체적으로 cmd로 만들기 명령어는 홈페이지에 있음
일대일 일대다 명령어로 정의
.env에서 db설정
config\database.php에서 env(첫 번째, 두 번째)는 .env에서 첫 번째 값을 쓰고 없으면 두 번째 값을 사용하겠다는 의미
Eloquent ORM
: 라라벨에 포함된 Eloquent ORM은 DB와 동작하는 아름답고 심플한 액티브 레코드를 제공, 각각 DB 테이블은 이에 해당하는 "모델"을 가지고 있다.
todos 테이블과 todo 모델
-> php artisan make:model 모델이름     으로 생성
 관련 영상: https://www.youtube.com/watch?v=cptr7GdR_lc

------------------------------
controller 두 개 연결 ->app http controolers 
-> auth는 인증
controller폴더에 .php파일 만들기(resource 컨트롤러)
만들기: php artisan make:controller 컨트롤러이름

resource라우트: 컨트롤러에 CRUD기능 지원(Create, Read, Update, Delete)
-> resource controller 만들기: php artisan make:controller 컨트롤러이름 --resource
(1) 리소스 라우트는 각 요청(get, post, put, patch, delete)에 따른 CRUD 기능을 제공하지만 구현은 함수안에 직접 코드를 작성해야함
(2) 함수들의 기본 기능은 다음과 같지만 사용 용도와 상황에 따라 각자 알아서 구현하면 됨
index: 전체 list 보여줌
store: 새로운 Data저장
create: 새로운 데이터 저장하기 위한 폼
show: 해당 id 관련 정보 보여줌
update: 해당 id 값 수정
edit: 해당 id 수정 폼
destroy: 해당 id data 삭제

컨트롤러 생성시 연관 모델을 지정하여 파일을 만들 수 있음
만들기: php artisan make:controller 모델이름 --model=모델이름
-> 만약 해당 model 없을 시 model과 controller 동시 생성
-> model을 사용 할 수 있도록 controller상에 "user App\모델이름" 으로  사용
-> model 지정 후 생성시 함수 입력값에 모델의 인스턴스가 타입 힌트되어 입력됨

------------------------------
Validator
: 입력값의 유효성 검사를 위해서 제공되는 클래스
입력값과 Rule을 인자로 전달 받아서 결과를 확인할 수 있다.
ex) Rule: "알파벳만 받아라", "숫자만 받아라"

입력값 겁증 실패시 $error 를 통해서 메세지를 뿌릴 수 있다.

-> PostController.php에 store()에 작성한다. (값을 넣어줄때 Rule을 정하기 때문)

------------------------------
Pagination
:Eloquent Orm을  사용할 때 paginate와 render 메소드를 사용하여
편리하게 page 출력을 할 수 있습니다.

------------------------------
Auth 기능
vendor\laravel\framework\src\illuminate\Foundation\Auth\AuthenticatesUsers
에서 Auth 기능 구현
Auth 기능 시작: php artisan make:auth
web.php 에는 home관련된 코드가 추가됨 views에 layout, auth 생성됨
route확인: php artisan route:list
app.blade.php 는 뼈대를 만들어주는 기능
Auth\RegisterController.php 에서 middleware('guest')는 누구든지 볼 수 있게 하기위해 guest로 설정되어 있다. -> vendor\laravel\framework\src\illuminate\Foundation\Auth\RegisterUsers에서 확인 가능
welcome.blade.php도 변경됨 로그인될시 안 될시에 따라

------------------------------
<<Laravel 6.0 명령어>>
미리 설치할 것: composer require illuminate/support
file 사용시: php artisan storage:link

서버실행: php artisan serve
생성: composer create-project --prefer-dist laravel/laravel 프로젝트명

auth 사용: composer require laravel/ui --dev
                 php artisan ui vue --auth

Controller 생성: php artisan make:controller 컨트롤러이름 (--resource)

php artisan make:model 모델이름
migration생성: php artisan make:migration 테이블이름
php artisan make:model 모델이름 --migration
migrate로 테이블에 반영하기: php artisan migrate
-> php artisan migrate:refresh

.env 파일 변경 후 반영하기: php artisan config:cache

엑셀: composer require maatwebsite/excel:^3.0.1
https://blog.naver.com/le_blanc_/221649507418
명령어
1. composer require maatwebsite/excel:^3.0.1
2. php artisan vendor:publish
3. 8선택 ->exel.php 생성됨
