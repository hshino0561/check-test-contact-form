<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::table('users', function (Blueprint $table) {
        //     // $table->string('phone')->nullable(); // カラムの追加
        //     // $table->string('email')->nullable(false)->change(); // カラムの変更
        //     // $table->dropColumn('category_id'); // カラムの削除
        // });

        // Schema::dropIfExists('contacts');

        Schema::create('contacts', function (Blueprint $table) {
            $table->bigIncrements('id'); // PRIMARY KEY
            $table->bigInteger('categry_id')->unsigned()->nullable(false); // FOREIGN KEY：外部キー
            $table->foreign('categry_id')->references('id')->on('categories'); // 外部キーの設定
            $table->string('first_name', 255)->nullable(false);
            $table->string('last_name', 255)->nullable(false);
            $table->tinyInteger('gender')->nullable(false); // 1:男性, 2:女性, 3:その他
            $table->string('email', 255)->nullable(false);
            $table->string('tel', 255)->nullable(false);
            $table->string('address', 255)->nullable(false);
            $table->string('building', 255)->nullable();
            $table->text('detail')->nullable(false);
            $table->timestamps(); // created_at, updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
