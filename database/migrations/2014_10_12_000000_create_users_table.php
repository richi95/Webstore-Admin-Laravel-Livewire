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
            $table->id();
            $table->integer('is_admin')->default(0);
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->string('phone_number')->nullable();
            
            $table->string('billing_name');
            $table->string('billing_zip');
            $table->string('billing_tax_nr')->nullable();
            $table->string('billing_city');
            $table->string('billing_address');
            $table->string('billing_address2')->nullable();

            $table->string('shipping_name');
            $table->string('shipping_zip');
            $table->string('shipping_city');
            $table->string('shipping_address');
            $table->string('shipping_address2')->nullable();
            
            $table->rememberToken();
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
