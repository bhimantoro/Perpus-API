<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('books', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('title');
			$table->bigInteger('publisher_id');
			$table->bigInteger('category_id');
			$table->bigInteger('author_id');
			$table->bigInteger('registration_number_id');
			$table->bigInteger('shelf_id');
			$table->year('year');
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
		Schema::dropIfExists('books');
	}
}
