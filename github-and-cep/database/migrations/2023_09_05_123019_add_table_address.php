<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTableAddress extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address', function (Blueprint $table) {
            $table->uuid('address_uid');
            $table->string('zip_code')->index()->nullable(false);
            $table->string('public_place')->index()->nullable(false);
            $table->string('complement')->nullable();
            $table->string('district')->index()->nullable(false);
            $table->string('city')->index()->nullable(false);
            $table->string('uf')->index()->nullable(false);
            $table->string('ibge')->nullable();
            $table->string('gia')->nullable();
            $table->string('ddd')->nullable();
            $table->string('siafi')->nullable();
            $table->boolean('is_visible')->index()->default(true);
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
        Schema::dropIfExists('address');
    }
}
