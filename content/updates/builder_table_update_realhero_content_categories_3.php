<?php namespace RealHero\Content\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateRealheroContentCategories3 extends Migration
{
    public function up()
    {
        Schema::table('realhero_content_categories', function($table)
        {
            $table->renameColumn('type', 'type_id');
        });
    }
    
    public function down()
    {
        Schema::table('realhero_content_categories', function($table)
        {
            $table->renameColumn('type_id', 'type');
        });
    }
}
