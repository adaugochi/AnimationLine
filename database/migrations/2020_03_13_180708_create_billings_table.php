<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('city');
            $table->string('postal_code')->nullable();
            $table->string('state');
            $table->string('country');
            $table->string('package');
            $table->string('currency');
            $table->string('sales_amount');
            $table->string('discount_price');
            $table->string('has_discount')->default(0);
            $table->string('has_brief')->default(0);
            $table->string('amount');
            $table->string('payment_status')->default('draft'); //paid
            $table->string('payment_id')->unique();
            $table->string('payment_method');
            $table->string('payer_id');
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
        Schema::dropIfExists('billings');
    }
}
