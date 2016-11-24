<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSlugToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Adds slug column to posts table
        // If you're going to be reading a column a lot you should consider indexing
        Schema::table('posts', function($table) {
            $table->string('slug')->unique()->after('body');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Drop the column without dropping the database
        // Requires a bunch of changes in json file plus running composer update
        Schema::table('posts', function($table) {
            $table->dropColumn('slug');  
        });
    }
}
