<?php

use App\Models\Position;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreatePositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('positions', function (Blueprint $table) {
            $table->id();
            $table->string('name', 45);
        });

        $data =  array(
            [
                'name' => 'Admin',
            ],
            [
                'name' => 'Karyawan',
            ],
            [
                'name' => 'Magang',
            ],
        );
        foreach ($data as $datum){
            $position = new Position(); //The Category is the model for your migration
            $position->name =$datum['name'];
            $position->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('positions');
    }
}
