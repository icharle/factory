<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStyleHisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('style_his', function (Blueprint $table) {
            $table->increments('id')->comment('星空人去向主键');
            $table->string('username')->comment('姓名');
            $table->string('picurl')->comment('图片路径');
            $table->string('year')->comment('年份');
            $table->string('oldoffice')->comment('曾经担任');
            $table->string('newoffice')->comment('现在担任');
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
        Schema::dropIfExists('style_his');
    }
}
