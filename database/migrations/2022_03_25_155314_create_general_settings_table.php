<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_settings', function (Blueprint $table) {
            $table->id();
            $table->string('admin_email')->unique();
            $table->string('sender_name');
            $table->string('sender_email')->unique();
            $table->string('webstore_name');
            $table->string('vat');
            $table->string('currency_name');
            $table->string('currency_symbol');
            $table->string('currency_decimal');
            $table->string('product_number');
            $table->string('coupon_price_above');
            $table->string('coupon_percent');
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
        Schema::dropIfExists('general_settings');
    }
}
