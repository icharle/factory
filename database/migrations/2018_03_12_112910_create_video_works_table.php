<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideoWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('video_works', function (Blueprint $table) {
            $table->increments('id')->comment('视频主键id');
            $table->string('video')->comment('视频链接');
            $table->string('title')->comment('标题');
            $table->string('author')->comment('作者');
            $table->string('sort')->comment('分类 0为街坊 1位星空直播 2为其它');
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
        Schema::dropIfExists('video_works');
    }
}
