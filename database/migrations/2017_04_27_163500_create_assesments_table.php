<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssesmentsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('assesments', function(Blueprint $table) {
            $table->increments('id');
            $table->string('grade_id');
            $table->integer('user_id');
            $table->integer('item_id');
            $table->string('item_type');
            $table->string('note')->nullable();
            $table->integer('weight')->nullable();
            $table->integer('parent_grade')->nullable();
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
		Schema::drop('assesments');
	}

}
