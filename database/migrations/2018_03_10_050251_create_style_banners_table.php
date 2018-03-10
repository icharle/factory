<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStyleBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('style_banners', function (Blueprint $table) {
            $table->increments('id')->comment('Banner主键');
            $table->string('picurl')->comment('图片路径');
            $table->string('time')->comment('时间');
            $table->string('center')->comment('中心');
            $table->string('direction')->comment('方向');
            $table->string('description')->comment('描述');
            $table->integer('isshow')->default(0)->comment('前台是否显示 1为显示 0为未显示');
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
        Schema::dropIfExists('style_banners');
    }
}
