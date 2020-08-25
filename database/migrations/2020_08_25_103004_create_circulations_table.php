<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCirculationsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('circulations', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->bigInteger('user_id');
			$table->bigInteger('book_id');
			$table->string('code', 45);
			$table->string('book_code');
			$table->date('entry_date');
			$table->date('out_date');
			$table->tinyInteger('status');
			$table->integer('penalty');
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
		Schema::dropIfExists('circulations');
	}
}
