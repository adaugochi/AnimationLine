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
            $table->string('service');
            $table->string('currency');
            $table->string('sales_amount');
            $table->string('discount_price');
            $table->string('has_discount')->default(0);
            $table->string('has_brief')->default(0);
            $table->string('amount');
            $table->string('status')->default('draft'); //in-progress completed delivered
            $table->string('payment_id')->nullable();
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
        Schema::table('billings', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
        Schema::dropIfExists('billings');
    }
}
