<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('account_id');
            $table->string('fullname', 100);
            $table->string('place_of_birth', 50)->nullable();
            $table->date('date_of_birth')->nullable();
            $table->enum('gender', ['LAKI', 'PEREMPUAN', 'OTHER'])->default('OTHER');
            $table->enum('religion',['ISLAM', 'KRISTEN', 'KATHOLIK', 'HINDU', 'BUDHA', 'KONGHUCU', 'OTHER'])->default('OTHER');
            $table->text('address')->nullable();
            $table->string('zipcode',6)->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('account_id')
            ->references('id')->on('account')
            ->restrictOnUpdate()
            ->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personal');
    }
}
