<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelationshipsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('relationships', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users');
			$table->integer('student1_id')->unsigned();
			$table->foreign('student1_id')->references('id')->on('students');
			$table->integer('student2_id')->unsigned();
			$table->foreign('student2_id')->references('id')->on('students');
			$table->integer('status')->default(0);
			$table->integer('num_stickiness')->unsigned()->default(1);
			$table->float('avg_stickiness')->default(0);
			$table->integer('tot_upvote')->unsigned()->default(0);
			$table->integer('tot_downvote')->unsigned()->default(0);
			$table->timestamp('start_date')->default(null)->nullable();
			$table->timestamp('end_date')->default(null)->nullable();

			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('relationships');
	}

}
