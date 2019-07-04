<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

// todos 테이블에 추가 하는 클래스
//php artisan make:migration AddColumnsToTodosTable 으로 생성
class AddColumnsToTodosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // todos 테이블에 어트리뷰트 추가하는 함수
        // php artisan migrate:refresh 로 추가
        Schema::table('todos', function (Blueprint $table) {
            $table->string('title');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('todos', function (Blueprint $table) {
            //
        });
    }
}
