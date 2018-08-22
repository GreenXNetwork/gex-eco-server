<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->boolean('confirmed')->default(false);
            $table->string('confirmation_code')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zipcode')->nullable();
            $table->unsignedInteger('country_id')->nullable();
            $table->integer('identity_type')->nullable();
            $table->string('identity_number')->nullable();
            $table->string('identity_image')->nullable();
            $table->tinyInteger('kyc_status')->default(1);
            $table->string('referred_by')->nullable();
            $table->unsignedInteger('address_id')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->dateTime('last_login_on')->nullable();
            $table->string('language')->default('en');
            $table->boolean('first_login')->default(true);
            $table->boolean('force_password_change')->default(true);
            $table->unsignedInteger('failed_login_count')->default(0);
            $table->dateTime('last_failed_login_on')->nullable();
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
