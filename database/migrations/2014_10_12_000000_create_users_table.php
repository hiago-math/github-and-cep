<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('user_uid');
            $table->bigInteger('github_id')->unique();
            $table->string('login')->unique()->nullable(false)->index();
            $table->string('name')->nullable(false)->index();
            $table->string('company')->nullable()->index();
            $table->string('bio')->nullable();
            $table->string('node_id')->index();
            $table->string('avatar_url')->nullable();
            $table->string('gravatar_id')->nullable()->default("");
            $table->string('url')->nullable(false);
            $table->string('html_url')->nullable(false);
            $table->string('type')->nullable();
            $table->integer('public_repos')->default(0);
            $table->integer('public_gists')->default(0);
            $table->integer('followers')->default(0);
            $table->integer('following')->default(0);
            $table->dateTime('created_at_github');
            $table->dateTime('updated_at_github');
            $table->dateTime('created_at')->useCurrent();
            $table->dateTime('updated_at')->useCurrent()->useCurrentOnUpdate();
            $table->softDeletes();
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
