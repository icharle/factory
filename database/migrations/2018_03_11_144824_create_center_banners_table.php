<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCenterBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('center_banners', function (Blueprint $table) {
            $table->increments('id')->comment('Banner主键');
            $table->string('picurl')->comment('图片路径');
            $table->string('time')->comment('时间');
            $table->string('title')->comment('标题');
            $table->string('sort')->comment('类别 0为技术 1为传媒 2为运策');
            $table->string('direction')->comment('方向');
            $table->text('description')->comment('描述');
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
        Schema::dropIfExists('center_banners');
    }
}
