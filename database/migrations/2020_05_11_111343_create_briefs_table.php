<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBriefsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('briefs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('billing_id')->unsigned();
            $table->foreign('billing_id')->references('id')->on('billings');
            $table->string('company_name');
            $table->string('company_logo');
            $table->string('orig_company_logo_name');
            $table->string('company_website')->nullable();
            $table->text('video_script')->nullable();
            $table->string('artist_gender')->nullable();
            $table->string('artist_accent')->nullable();
            $table->string('voice_type')->nullable();
            $table->string('video_speed')->nullable();
            $table->string('logo_sample')->nullable();
            $table->string('orig_logo_sample_name')->nullable();
            $table->string('other_info')->nullable();
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
        Schema::table('briefs', function (Blueprint $table) {
            $table->dropForeign(['billing_id']);
        });
        Schema::dropIfExists('briefs');
    }
}
