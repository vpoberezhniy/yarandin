<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_name');
            $table->string('name');
            $table->string('email')->unique();
            $table->text('text'); /*Здесь можно было поставить и BLOB, но я не знаю насколько большим будет текст. Если нужно будет изменить, это можно будет поправить в самой БД а так же не забыть изменить в миграции*/
            $table->string('ip');
            $table->string('file');
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
        Schema::dropIfExists('users');
    }
}

/*
        USER_NAME - поле input, обязательное;
        NAME - поле input, обязательное;
        EMAIL - поле input, обязательное;
        TEXT - поле textarea, минимум 20 символов;
        IP - поле с адресом клиента.
        FILE - поле file, необязательно.
        Date - поле со временем создания записи.