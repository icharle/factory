<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCenterWechatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('center_wechats', function (Blueprint $table) {
            $table->increments('id')->comment('微信文章主键id');
            $table->string('url')->comment('微信文章链接');
            $table->string('title')->comment('微信文章标题');
            $table->string('author')->comment('微信文章作者');
            $table->string('time')->comment('微信文章时间');
            $table->string('thumb_url')->comment('微信文章图片原链接');
            $table->string('save_file')->comment('本地图片');
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
        Schema::dropIfExists('center_wechats');
    }
}
