<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideoBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('video_banners', function (Blueprint $table) {
            $table->increments('id')->comment('视频主键id');
            $table->string('video')->comment('视频链接');
            $table->string('title')->comment('标题');
            $table->string('author')->comment('作者');
            $table->string('time')->comment('时间');
            $table->string('people')->comment('参演人员');
            $table->string('description')->comment('描述');
            $table->string('isshow')->default(0)->comment('是否前台展示 0为不展示 1为展示');
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
        Schema::dropIfExists('video_banners');
    }
}
