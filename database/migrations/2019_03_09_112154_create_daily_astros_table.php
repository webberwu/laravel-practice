<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDailyAstrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_astros', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('day')->comment('撈取日期 timestamp');
            $table->unsignedTinyInteger('astro_id')->comment('星座 ID，中文對照請見 DailyAstro model');
            $table->unsignedTinyInteger('overall_star')->comment('整體運勢星星數');
            $table->unsignedTinyInteger('love_star')->comment('愛情運勢星星數');
            $table->unsignedTinyInteger('career_star')->comment('事業運勢星星數');
            $table->unsignedTinyInteger('money_star')->comment('財運運勢星星數');
            $table->text('overall_content')->comment('整體運勢內容');
            $table->text('love_content')->comment('愛情運勢內容');
            $table->text('career_content')->comment('事業運勢內容');
            $table->text('money_content')->comment('財運運勢內容');
            $table->unsignedInteger('created_at');
            $table->unsignedInteger('updated_at');

            $table->unique(['day', 'astro_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('daily_astros');
    }
}
