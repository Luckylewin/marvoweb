<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModelsDriverSurveysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 创建调查表
        Schema::create('driver_surveys', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',255)->default('')->comment('名称');
            $table->string('age',30)->default('')->comment('年龄');
            $table->string('sexuality',6)->default('male')->comment('性别');
            $table->string('region',255)->default('')->comment('地区/国家');
            $table->string('email',255)->default('')->comment('性别');
            $table->string('game',255)->default('')->comment('游戏');
	    $table->string('suggest',1000)->default('')->comment('建议');
	    $table->string('type',255)->default('')->comment('型号');
	    $table->string('facebook',255)->default('')->comment('facebook');
            $table->integer('created_at')->comment('创建时间');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('driver_surveys');
    }
}
