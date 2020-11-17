<?php namespace RealHero\Content\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateRealheroContentCategories2 extends Migration
{
    public function up()
    {
        Schema::table('realhero_content_categories', function($table)
        {
            $table->integer('type');
        });
    }
    
    public function down()
    {
        Schema::table('realhero_content_categories', function($table)
        {
            $table->dropColumn('type');
        });
    }
}
