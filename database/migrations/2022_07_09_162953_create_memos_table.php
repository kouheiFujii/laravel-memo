<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('memos', function (Blueprint $table) {
            // 符号なしキー、第2引数は Auto Incrementの設定
            $table->unsignedBigInteger("id", true);
            $table->string(("content"));
            $table->unsignedBigInteger("user_id");
            $table->softDeletes(); // 論理削除を定義
            // timestampのみだと値が入らないので、生SQLで直接書く
            $table->timestamp("updated_at")->default(\DB::raw("CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP"));
            $table->timestamp("created_at")->default(\DB::raw("CURRENT_TIMESTAMP"));
            // 外部キー制約。存在する user_id しか登録できなくなる
            $table->foreign("user_id")->references("id")->on("users");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('memos');
    }
}
