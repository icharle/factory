<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStyleActsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('style_acts', function (Blueprint $table) {
            $table->increments('id')->comment('活动记录主键');
            $table->text('picurl')->comment('图片路径');
            $table->string('time')->comment('时间');
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
        Schema::dropIfExists('style_acts');
    }
}
