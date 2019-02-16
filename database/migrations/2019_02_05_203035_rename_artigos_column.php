<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameArtigosColumn extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::table('artigos', function(Blueprint $table) {
      $table->renameColumn('string', 'descricao');
    });
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
    Schema::table('artigos', function(Blueprint $table) {
      $table->renameColumn('descricao', 'string');
    });
  }
}
