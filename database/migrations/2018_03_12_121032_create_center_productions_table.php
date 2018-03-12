<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCenterProductionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('center_productions', function (Blueprint $table) {
            $table->increments('id')->comment('作品主键');
            $table->string('picurl')->comment('图片路径');
            $table->string('video_url')->comment('视频链接');
            $table->string('time')->comment('时间');
            $table->string('title')->comment('标题');
            $table->string('center')->comment('中心 0为技术研发中心 1为文化传媒中心');
            $table->string('sort')->comment('分类 0为web 1为Android 2为iOS 3为海报 4为UI设计 5为街坊视频 6为摄影视频');
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
        Schema::dropIfExists('center_productions');
    }
}
