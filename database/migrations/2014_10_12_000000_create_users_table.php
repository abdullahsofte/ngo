<?php

use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Hash;

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
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->string('username');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('image')->default('noImage.png');
            $table->string('status', 1)->default(1);
            $table->rememberToken();
            $table->timestamps();
        });

        // create a default user
        
        $user = new User();
        $user->name = 'Mr.Admin';
        $user->phone = '01700000000';
        $user->email = 'admin@gmail.com';
        $user->username = 'admin';
        $user->password = Hash::make('1');
        $user->save();
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
