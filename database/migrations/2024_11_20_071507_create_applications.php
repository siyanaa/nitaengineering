<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('vacancy_id')->constrained()->onDelete('cascade');
            $table->string('email');
            $table->text('address')->nullable();
            $table->string('phone_number');
            $table->string('citizenship_front_image');
            $table->string('citizenship_back_image');
            $table->string('cv_pdf');
            $table->string('transcript');
            $table->string('engineering_license_image');
            $table->string('status')->default('pending');
            $table->text('work_experience')->nullable();
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
        Schema::dropIfExists('applications');
    }
};



