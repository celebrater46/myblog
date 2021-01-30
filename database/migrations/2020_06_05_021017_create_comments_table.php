<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            // $table->integer("post_id"); // Post に対する紐付け
            $table->unsignedInteger("post_id"); // 正の整数限定
            $table->string("body"); // 一行コメントなので string。長文なら text
            $table->timestamps();
            // ↓ post_id を posts テーブルの id に紐付ける外部キー制約。かつ関連するコメントの削除設定
            $table
                ->foreign("post_id")
                ->references("id")
                ->on("posts")
                ->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
