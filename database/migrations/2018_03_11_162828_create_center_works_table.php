<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCenterWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('center_works', function (Blueprint $table) {
            $table->increments('id')->comment('活动记录主键');
            $table->text('picurl')->comment('图片路径');
            $table->string('time')->comment('时间');
            $table->string('sort')->comment('类别 0为技术 1为传媒 2为运策');
            $table->string('title')->comment('标题');
            $table->text('description')->comment('描述');
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
        Schema::dropIfExists('center_works');
    }
}
